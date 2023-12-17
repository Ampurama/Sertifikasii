@extends('master')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Selamat Datang, <b>{{ Auth::user()->name }}</b></h4>
            </div>
        </div>


        @if (Auth::user()->admin === 'False')
            <div class="row">
                <div class="col-md-6">
                    <h2>Form Data Mahasiswa</h2>
                    <form method="POST" action="{{ url('/simpan-mahasiswa') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                            <label for="namaLengkap" class="form-label">Nama Lengkap (sesuai ijazah disertai
                                gelar)</label>

                            <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" </div>

                            <div class="form-group">
                                <label for="alamatktp">Alamat KTP</label>
                                <input type="text" class="form-control" id="alamatktp" name="alamatktp" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap Saat Ini</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select class="form-control" id="provinsi" name="provinsi">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kabupaten">Kabupaten/Kota</label>
                                <select class="form-control" id="kabupaten" name="kabupaten"></select>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                            </div>

                            <div class="form-group">
                                <label for="nomortlp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomortlp" name="nomortlp" required>
                            </div>

                            <div class="form-group">
                                <label for="nomorhp">Nomor HP</label>
                                <input type="text" class="form-control" id="nomorhp" name="nomorhp" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                            </div>

                            <div class="form-group">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select id="kewarganegaraan" class="form-select" name="kewarganegaraan">
                                    <option selected>Choose...</option>
                                    <option value="WNI Asli">WNI Asli</option>
                                    <option value="WNI Keturunan">WNI Keturunan</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            <div id="form-asal-wna" style="display: none;">
                                <div class="form-group">
                                    <label for="asalWNA" class="form-label">Asal WNA</label>
                                    <input type="text" name="asalWNA" class="form-control" id="asalWNA"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggallahir" class="form-control" id="tanggallahir"
                                    aria-describedby="emailHelp">

                            </div>

                            <div class="form-group">
                                <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempatlahir" class="form-control" id="tempatlahir"
                                    aria-describedby="emailHelp">

                            </div>  
                            
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi">
                            </div>
                            
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten/Kota</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten/Kota">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Status Menikah</label>
                                <select class="form-select" name="statusMenikah" id="inlineFormSelectPref">
                                    <option selected>Choose...</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Agama</label>
                                <select class="form-select" name="agama" id="inlineFormSelectPref">
                                    <option selected>Choose...</option>
                                    <option value="1">Hindu</option>
                                    <option value="2">Islam</option>
                                    <option value="3">Kristen</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        <p>Anda tidak memiliki akses ke halaman ini.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        var formAsalWNA = document.getElementById('form-asal-wna');

        // Dapatkan elemen select kewarganegaraan
        var selectKewarganegaraan = document.getElementById('kewarganegaraan');

        // Tambahkan event listener untuk mengontrol tampilan form asal WNA
        selectKewarganegaraan.addEventListener('change', function() {
            if (this.value === 'WNA') {
                // Jika memilih WNA, tampilkan form asal WNA
                formAsalWNA.style.display = 'block';
            } else {
                // Jika memilih selain WNA, sembunyikan form asal WNA
                formAsalWNA.style.display = 'none';
            }
        });
        document.getElementById('provinsi').addEventListener('change', function() {
            // Dapatkan elemen form asal WNA

            var provinsiId = this.value;
            fetch('{{ url('/get-kabupaten/') }}/' + provinsiId)
                .then(response => response.json())
                .then(data => {
                    var kabupatenSelect = document.getElementById('kabupaten');
                    kabupatenSelect.innerHTML = '';
                    data.forEach(function(kabupaten) {
                        var option = document.createElement('option');
                        option.value = kabupaten.name;
                        option.text = kabupaten.name;
                        kabupatenSelect.appendChild(option);
                    });
                });
        });
        
    </script>
@endsection
