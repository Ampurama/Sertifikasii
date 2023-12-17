@extends('master')

@section('konten')
    <div class="container">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false, // Remove the "OK" button
                    timer: 1000 // Set the duration in milliseconds (e.g., 3 seconds)
                });
            </script>
        @endif
        <div class="card shadow-lg">
            <div class="card-header  bg-primary text-white ">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Alamat KTP</th>
                                <th>Alamat Saat Ini</th>
                                <th>Provinsi</th>
                                <th>Kabupaten/Kota</th>
                                <th>Kecamatan</th>
                                <th>Nomor Telepon</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Kewarganegaraan</th>
                                <th>Asal WNA</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Status Menikah</th>
                                <th>Agama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $mhs->namaLengkap }}</td>
                                    <td>{{ $mhs->alamatktp }}</td>
                                    <td>{{ $mhs->alamat }}</td>
                                    <td>{{ $mhs->provinsi }}</td>
                                    <td>{{ $mhs->kabupaten }}</td>
                                    <td>{{ $mhs->kecamatan }}</td>
                                    <td>{{ $mhs->nomortlp }}</td>
                                    <td>{{ $mhs->nomorhp }}</td>
                                    <td>{{ $mhs->email }}</td>
                                    <td>{{ $mhs->kewarganegaraan }}</td>
                                    <td>{{ $mhs->asalWNA }}</td>
                                    <td>{{ $mhs->tanggallahir }}</td>
                                    <td>{{ $mhs->tempatlahir }}</td>
                                    <td>{{ $mhs->statusMenikah }}</td>
                                    <td>{{ $mhs->agama }}</td>
                                    <td>
                                        <a href="{{ route('edit-mahasiswa', $mhs->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('delete-mahasiswa', $mhs->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
