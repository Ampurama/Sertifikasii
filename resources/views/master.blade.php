<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Pendataan Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-xl">
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom shadow-sm">
            <div class="container-fluid">
                
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">Aplikasi Pendataan Mahasiswa</a>

                </div>
              
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::user()->admin === 'True')
                            <li><a href="{{ route('data-mahasiswa') }}">Data Mahasiswa</a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">List User <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.users.index') }}">User List</a></li>
                                   
                                </ul>
                            </li>
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Form Mahasiswa <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('form-mahasiswa') }}">Input Mahasiswa</a></li>
                                    
                                </ul>
                            </li>
                        @else
                          
                            <li><a href="{{ route('form-mahasiswa') }}">Input Mahasiswa</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                                {{ Auth::user()->email }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a>Level: {{ Auth::user()->admin }}</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('actionlogout') }}"><i class="fa fa-power-off"></i> Log
                                        Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('konten')
    </div>
    <!-- Script -->
    @yield('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
