<!DOCTYPE html>
<html>
<head>
    <title>PDF Template</title>
</head>
<body>
    
    <h1>Data Mahasiswa</h1>
    <p>Name: {{ $data->namaLengkap }}</p>
    <p>Address: {{ $data->alamat }}</p>
    <p>no Telepon: {{ $data->nomortlp }}</p>
    <p>no HP: {{ $data->nomorhp }}</p>
    <p>email: {{ $data->email }}</p>
    <p>kewarganegaraan: {{ $data->kewarganegaraan }}</p>
    <p>tanggal lahir: {{ $data->tanggallahir }}</p>
    <p>tempat lahir: {{ $data->tempatlahir }}</p>
    <p>status Menikah: {{ $data->statusMenikah }}</p>
    <p>agama: {{ $data->agama }}</p>
    
</body>
</html>