<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            background-image: url('https://a-static.besthdwallpaper.com/school-classroom-wallpaper-1920x1080-69041_48.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .card {
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.8);
            /* Add this line to set a white background */
        }

        .container {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1000
                });
            </script>
        @endif
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <h2 class="text-center">Aplikasi Pendataan Mahasiswa</h2>
                <hr>
                @if (session('message'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="register">Register</a> sekarang!</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
