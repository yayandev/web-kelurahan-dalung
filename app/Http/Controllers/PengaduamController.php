<?php

namespace App\Http\Controllers;

use App\Models\Pengaduam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduamController extends Controller
{
    //

    public function index()
    {
        $pengaduans = Pengaduam::paginate(10);
        return view('pengaduans', compact('pengaduans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_whatsapp' => ['required', 'string', 'max:15', function ($attribute, $value, $fail) {
                if (Pengaduam::where('no_whatsapp', $value)->whereDate('created_at', today())->exists()) {
                    $fail('The ' . $attribute . ' has already been taken today.');
                }
            }],
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama', 'no_whatsapp', 'subjek', 'pesan']);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('pengaduan_images', 'public');
            $data['gambar'] = $path;
        }

        Pengaduam::create($data);

        return redirect()->back()->with('success', 'Pengaduan anda telah terkirim. Terima kasih!');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduam::findOrFail($id);
        if ($pengaduan->gambar) {
            Storage::disk('public')->delete($pengaduan->gambar);
        }
        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan deleted successfully.');
    }
}
