@extends('master')

@section('konten')
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST" action="{{ url('update-mahasiswa/' . $mahasiswa->id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap (sesuai ijazah disertai gelar):</label>
                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap"
                    value="{{ $mahasiswa->namaLengkap }}" required>
            </div>

            <div class="form-group">
                <label for="alamatktp">Alamat KTP:</label>
                <input type="text" class="form-control" id="alamatktp" name="alamatktp"
                    value="{{ $mahasiswa->alamatktp }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap Saat Ini:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}"
                    required>
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $mahasiswa->provinsi }}"
                    required>
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten/Kota:</label>
                <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                    value="{{ $mahasiswa->kabupaten }}" required>
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan:</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                    value="{{ $mahasiswa->kecamatan }}" required>
            </div>

            <div class="form-group">
                <label for="nomortlp">Nomor Telepon:</label>
                <input type="text" class="form-control" id="nomortlp" name="nomortlp" value="{{ $mahasiswa->nomortlp }}"
                    required>
            </div>

            <div class="form-group">
                <label for="nomorhp">Nomor HP:</label>
                <input type="text" class="form-control" id="nomorhp" name="nomorhp" value="{{ $mahasiswa->nomorhp }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}"
                    required>
            </div>

            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan:</label>
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                    value="{{ $mahasiswa->kewarganegaraan }}" required>
            </div>

            <div class="form-group">
                <label for="asalWNA">Asal WNA:</label>
                <input type="text" class="form-control" id="asalWNA" name="asalWNA" value="{{ $mahasiswa->asalWNA }}">
            </div>

            <div class="form-group">
                <label for="tanggallahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                    value="{{ $mahasiswa->tanggallahir }}" required>
            </div>

            <div class="form-group">
                <label for="tempatlahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                    value="{{ $mahasiswa->tempatlahir }}" required>
            </div>

            <div class="form-group">
                <label for="statusMenikah">Status Menikah:</label>
                <input type="text" class="form-control" id="statusMenikah" name="statusMenikah"
                    value="{{ $mahasiswa->statusMenikah }}" required>
            </div>

            <div class="form-group">
                <label for="agama">Agama:</label>
                <input type="text" class="form-control" id="agama" name="agama"
                    value="{{ $mahasiswa->agama }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
