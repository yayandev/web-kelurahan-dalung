@extends('layouts.app')

@section('content')
    {{-- visi misi --}}
    <section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 space-y-12">
        <div class="w-full bg-white rounded-2xl shadow-2xl overflow-hidden animate-fade-in p-6"
            style="animation-delay: 0.2s;">
            <h1 class="text-emerald-600 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4 text-center">Visi</h1>
            <p class="text-gray-600 text-base sm:text-lg lg:text-xl leading-relaxed max-w-3xl mx-auto mb-8">
                {{ $visi_misi->visi }}
            </p>
        </div>

        <div class="w-full bg-white rounded-2xl shadow-2xl overflow-hidden animate-fade-in p-6"
            style="animation-delay: 0.2s;">
            <h1 class="text-emerald-600 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4 text-center">Misi</h1>
            <ul
                class="list-disc list-inside text-gray-600 text-base sm:text-lg lg:text-xl leading-relaxed max-w-3xl mx-auto mb-8">
                @foreach ($visi_misi->misi as $misi)
                    <li class="mb-2">{{ $misi }}</li>
                @endforeach
            </ul>
        </div>
    </section>


    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <div class="mb-10 lg:mb-12">
            <h2 class="text-[#059669] text-5xl sm:text-6xl font-extrabold leading-tight tracking-tight">
                Sejarah Desa Tamang
            </h2>
        </div>

        <!-- Content Card: Image and Text -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col lg:flex-row">
            <!-- Left Side: Image -->
            <div class="w-full lg:w-1/2 h-80 lg:h-auto overflow-hidden">
                <!-- Replace with actual image path for the village landscape -->
                <img src="/kantor.jpeg" alt="Pemandangan Desa Tamang" class="w-full h-full object-cover">
            </div>

            <!-- Right Side: History Text -->
            <div class="w-full lg:w-1/2 p-8 bg-custom-light-pink flex items-center">
                <p class="text-custom-dark-text text-lg sm:text-xl leading-relaxed">
                    {{ $profil->sejarah }}
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-start mb-12 animate-fade-in">
            <h1 class="text-[#059669] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                Peta Lokasi Kelurahan Dalung
            </h1>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden animate-fade-in" style="animation-delay: 0.2s;">
            <div class="flex flex-col lg:flex-row">
                <!-- Map Section -->
                <div class="w-full lg:w-1/2 p-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Peta Interaktif</h3>
                        <p class="text-gray-600 text-sm">Klik dan drag untuk menjelajahi peta</p>
                    </div>
                    <div id="mapid" class="leaflet-container"></div>
                </div>

                <!-- Information Section -->
                <div class="w-full lg:w-1/2 p-6 lg:border-l border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">
                            Informasi Geografis
                        </h3>
                        <p class="text-gray-600">Data lengkap wilayah Kelurahan Dalung</p>
                    </div>

                    <!-- Info Cards Grid -->
                    <div class="space-y-4">
                        <!-- Luas Wilayah -->
                        <div class="info-card card-hover rounded-xl p-4">
                            <div class="flex items-center space-x-4">
                                <div class="icon-circle flex-shrink-0">
                                    <i class="fas fa-ruler-combined"></i>
                                </div>
                                <div class="flex-grow">
                                    <p class="font-semibold text-gray-700 text-sm uppercase tracking-wide">Luas Wilayah</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $profil->luas_wilayah }} Hektare</p>
                                </div>
                            </div>
                        </div>

                        <!-- Batas Wilayah -->
                        <div class="info-card card-hover rounded-xl p-4">
                            <div class="mb-3">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="icon-circle flex-shrink-0">
                                        <i class="fas fa-compass"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-700 text-sm uppercase tracking-wide">Batas Wilayah
                                    </h4>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                                    <span class="text-sm font-medium text-gray-600">Utara:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $profil->batas_utara }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                                    <span class="text-sm font-medium text-gray-600">Selatan:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $profil->batas_selatan }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                                    <span class="text-sm font-medium text-gray-600">Timur:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $profil->batas_timur }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                                    <span class="text-sm font-medium text-gray-600">Barat:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $profil->batas_barat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Data GeoJSON yang Anda berikan
        const geojson_data = {
            "type": "Feature",
            "properties": {
                "kd_propinsi": "36",
                "kd_dati2": "73",
                "kd_kecamatan": "005",
                "kd_kelurahan": "007",
                "nm_kelurahan": "Dalung"
            },
            "geometry": {
                "type": "MultiPolygon",
                "coordinates": [
                    [
                        [
                            [106.15952436200007, -6.138872861999971, 0.0],
                            [106.15929741600007, -6.138882695999939, 0.0],
                            [106.15920652600005, -6.138950550999937, 0.0],
                            [106.15913101900009, -6.13903251499994],
                            [106.15913312100008, -6.139108208999971, 0.0],
                            [106.15913528400006, -6.139186121999956, 0.0],
                            [106.15912495900005, -6.139350158999946, 0.0],
                            [106.15912409400005, -6.139363893999928, 0.0],
                            [106.15912387800006, -6.139367336999953, 0.0],
                            [106.15915097700008, -6.139485910999952, 0.0],
                            [106.15917557700004, -6.139593538999975, 0.0],
                            [106.15926635200009, -6.139746958999979, 0.0],
                            [106.15948974200006, -6.139855513999976, 0.0],
                            [106.15959710300007, -6.139943185999925, 0.0],
                            [106.15962495500008, -6.140092803999949, 0.0],
                            [106.15955153700008, -6.140225071999964, 0.0],
                            [106.15945632000006, -6.140305868999974, 0.0],
                            [106.15935195900005, -6.140388303999941, 0.0],
                            [106.15923007800006, -6.140439442999934, 0.0],
                            [106.15907775700003, -6.14051778299995, 0.0],
                            [106.15891865800006, -6.140596134999953, 0.0],
                            [106.15873542700007, -6.140693601999942, 0.0],
                            [106.15871068900009, -6.140789856999959, 0.0],
                            [106.15875429700009, -6.140909804999978, 0.0],
                            [106.15884165900007, -6.141030433999958, 0.0],
                            [106.15904095500008, -6.141275152999981, 0.0],
                            [106.15919956200008, -6.141369029999964, 0.0],
                            [106.15931775400009, -6.141499052999961, 0.0],
                            [106.15933444400008, -6.14169074299997, 0.0],
                            [106.15932708900004, -6.141814864999958, 0.0],
                            [106.15929167000007, -6.141947538999943, 0.0],
                            [106.15921710000003, -6.142061243999933, 0.0],
                            [106.15897536400007, -6.142191228999934, 0.0],
                            [106.15881652100006, -6.142351022999947, 0.0],
                            [106.15872629700004, -6.142529802999945, 0.0],
                            [106.15871710500005, -6.14273322799994, 0.0],
                            [106.15871253900008, -6.142922582999972, 0.0],
                            [106.15867305400008, -6.143067168999949, 0.0],
                            [106.15870334400006, -6.143271396999978, 0.0],
                            [106.15881807300008, -6.143415648999962, 0.0],
                            [106.15895255900006, -6.143495082999948, 0.0],
                            [106.15903769800008, -6.143758982999941, 0.0],
                            [106.15896544700007, -6.143851849999976, 0.0],
                            [106.15888805900005, -6.143951321999964, 0.0],
                            [106.15873455800005, -6.144008138999936, 0.0],
                            [106.15859750200008, -6.144022311999947, 0.0],
                            [106.15840886900008, -6.144018825999979, 0.0],
                            [106.15823633900004, -6.143972185999928, 0.0],
                            [106.15804178600007, -6.143927808999933, 0.0],
                            [106.15789886700009, -6.143823822999934, 0.0],
                            [106.15776520500003, -6.143719998999927, 0.0],
                            [106.15760045200005, -6.143663754999977, 0.0],
                            [106.15744302800005, -6.143656704999955, 0.0],
                            [106.15730044700007, -6.14368903999997, 0.0],
                            [106.15716685600006, -6.143798272999959, 0.0],
                            [106.15709583400007, -6.143897207999942, 0.0],
                            [106.15702831600004, -6.143949164999981, 0.0],
                            [106.15697044100006, -6.143993700999943, 0.0],
                            [106.15688489400009, -6.144163724999942, 0.0],
                            [106.15691947400006, -6.144256924999979, 0.0],
                            [106.15698857400008, -6.144409158999963, 0.0],
                            [106.15702954800008, -6.144519732999981, 0.0],
                            [106.15703629400008, -6.144537939999964, 0.0],
                            [106.15713683200005, -6.14473447599994, 0.0],
                            [106.15698179800006, -6.144843739999942, 0.0],
                            [106.15637522700007, -6.145205407999981, 0.0],
                            [106.15594696600004, -6.145441431999927, 0.0],
                            [106.15567654800009, -6.145473428999935, 0.0],
                            [106.15538137500005, -6.145445024999958, 0.0],
                            [106.15465703900009, -6.145198652999966, 0.0],
                            [106.15448688900005, -6.145128554999928, 0.0],
                            [106.15431139100008, -6.145077752999953, 0.0],
                            [106.15407293800007, -6.145053927999925, 0.0],
                            [106.15396641800004, -6.145049312999959, 0.0],
                            [106.15379948400005, -6.145010961999958, 0.0],
                            [106.15342640100005, -6.144884616999946, 0.0],
                            [106.15325919600008, -6.144831674999978, 0.0],
                            [106.15317172300007, -6.144783299999972, 0.0],
                            [106.15308097900004, -6.144754069999976, 0.0],
                            [106.15288858400004, -6.144734995999954, 0.0],
                            [106.15250536500008, -6.144718836999971, 0.0],
                            [106.15240579300007, -6.14469476499994, 0.0],
                            [106.15136833500009, -6.144654722999974, 0.0],
                            [106.15128105400004, -6.14464299399998, 0.0],
                            [106.15009926200008, -6.144469092999941, 0.0],
                            [106.14995637800007, -6.144954739999946, 0.0],
                            [106.14959567800008, -6.14613559999998, 0.0],
                            [106.14951537500008, -6.146186972999942, 0.0],
                            [106.14939576300009, -6.146172274999969, 0.0],
                            [106.14930129200008, -6.14616869799994, 0.0],
                            [106.14852593400008, -6.146049310999956, 0.0],
                            [106.14826380900007, -6.146030871999926, 0.0],
                            [106.14820040500007, -6.146054814999957, 0.0],
                            [106.14809104200003, -6.146389699999929, 0.0],
                            [106.14792609800008, -6.146743958999934, 0.0],
                            [106.14784941600004, -6.146777033999967, 0.0],
                            [106.14696699000007, -6.14668867599994, 0.0],
                            [106.14678544400005, -6.146670496999945, 0.0],
                            [106.14658033600006, -6.146672894999938, 0.0],
                            [106.14645235600005, -6.146612853999954, 0.0],
                            [106.14493039600006, -6.145760694999979, 0.0],
                            [106.14436534400005, -6.145420201999968, 0.0],
                            [106.14430464600008, -6.145272601999977, 0.0],
                            [106.14423816400006, -6.145080365999945, 0.0],
                            [106.14422950500006, -6.145055328999945, 0.0],
                            [106.14412724700009, -6.144892350999953, 0.0],
                            [106.14397737800005, -6.144641297999954, 0.0],
                            [106.14385685600007, -6.144514321999964, 0.0],
                            [106.14373772900007, -6.144512221999946, 0.0],
                            [106.14339380800004, -6.144255635999968, 0.0],
                            [106.14331898400008, -6.144175385999972, 0.0],
                            [106.14317643900006, -6.144127217999937, 0.0],
                            [106.14292841800005, -6.144115632999956, 0.0],
                            [106.14260654500004, -6.144080395999936, 0.0],
                            [106.14224419200008, -6.143955285999937, 0.0],
                            [106.14161766400008, -6.143718242999967, 0.0],
                            [106.14138463800003, -6.143680874999973, 0.0],
                            [106.14108562000007, -6.143596242999934, 0.0],
                            [106.14069990800004, -6.143487066999967, 0.0],
                            [106.14051300400007, -6.143489439999939, 0.0],
                            [106.14043304800003, -6.143542071999946, 0.0],
                            [106.14012754600009, -6.143518464999943, 0.0],
                            [106.13992585700004, -6.143472603999953, 0.0],
                            [106.13707848500007, -6.143153163999955, 0.0],
                            [106.13730717500005, -6.142796522999959, 0.0],
                            [106.13760292700005, -6.142475527999977, 0.0],
                            [106.13791751000008, -6.142076175999932, 0.0],
                            [106.13830114900009, -6.141511453999954, 0.0],
                            [106.13862200600005, -6.141029664999962, 0.0],
                            [106.13900407200003, -6.140672759999973, 0.0],
                            [106.13932838000005, -6.140331868999965, 0.0],
                            [106.13937100400005, -6.140229168999952, 0.0],
                            [106.13940378700005, -6.140122228999928, 0.0],
                            [106.13952166900003, -6.139888927999948, 0.0],
                            [106.14025953900006, -6.138726230999964, 0.0],
                            [106.14048154500006, -6.138411479999945, 0.0],
                            [106.14074392200007, -6.138149614999975, 0.0],
                            [106.14118660100007, -6.137755162999952, 0.0],
                            [106.14143027100005, -6.13742904999998, 0.0],
                            [106.14167405900008, -6.13723521299994],
                            [106.14181067400006, -6.13707932899996, 0.0],
                            [106.14226687800004, -6.136311028999955, 0.0],
                            [106.14263323600005, -6.136681803999977, 0.0],
                            [106.14302516500004, -6.136724787999981, 0.0],
                            [106.14338176000007, -6.136639432999971, 0.0],
                            [106.14402247100008, -6.136331416999951, 0.0],
                            [106.14474153900005, -6.135294071999965, 0.0],
                            [106.14527565200007, -6.135434746999977, 0.0],
                            [106.15277639100009, -6.13716879499998, 0.0],
                            [106.15299547500007, -6.136418641999967, 0.0],
                            [106.15345335600006, -6.136452953999935, 0.0],
                            [106.15418995800007, -6.136758602999976, 0.0],
                            [106.15422546300005, -6.137100543999964, 0.0],
                            [106.15420699100008, -6.137454091999928, 0.0],
                            [106.15952436200007, -6.138872861999971, 0.0]
                        ]
                    ]
                ]
            }
        };

        // Inisialisasi peta
        const map = L.map('mapid').setView([-6.14, 106.15], 14); // Set view awal dekat Dalung

        // Tambahkan Tile Layer (misalnya OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Gaya untuk batas wilayah
        function style(feature) {
            return {
                fillColor: '#800080', // Warna ungu untuk mengisi poligon
                weight: 3,
                opacity: 1,
                color: 'purple', // Warna garis batas
                dashArray: '3',
                fillOpacity: 0.5
            };
        }

        // Tambahkan GeoJSON ke peta
        const geojsonLayer = L.geoJSON(geojson_data, {
            style: style,
            onEachFeature: function(feature, layer) {
                // Tambahkan popup dengan nama kelurahan saat diklik
                if (feature.properties && feature.properties.nm_kelurahan) {
                    layer.bindPopup("<b>Desa:</b> " + feature.properties.nm_kelurahan);
                }
            }
        }).addTo(map);

        // Sesuaikan tampilan peta agar mencakup seluruh GeoJSON
        map.fitBounds(geojsonLayer.getBounds());
    </script>
@endsection
