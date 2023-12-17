<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
            
        }

        .container {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <h2 class="text-center">FORM REGISTER USER</h2>
                <hr>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-key"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-address-book"></i> Role</label>
                        <input type="text" name="role" class="form-control" value="Guest" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i>
                        Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun silahkan <a href="login">Login Disini!</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
