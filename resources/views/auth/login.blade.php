<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login | Inventaris</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #6c63ff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .btn-primary {
            background: #6c63ff;
            border: none;
            border-radius: 20px;
            padding: 12px 20px;
            font-weight: bold;
            font-size: 1rem;
        }

        .text-muted a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }

        .simple-footer {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="/postlogin" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="mt-4 text-muted text-center">
                            Belum punya akun? <a href="/register">Daftar baru</a>
                        </div>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Kukuh Wisanggeni 2025
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    @if(session('sukses'))
    <script>
        $(function () {
            swal({
                title: 'Success',
                text: "{{ session('sukses') }}",
                icon: 'success',
                buttons: false,
                timer: 2000,
            });
        });
    </script>
    @elseif(session('gagal'))
    <script>
        $(function () {
            swal({
                title: 'Failed',
                text: "{{ session('gagal') }}",
                icon: 'warning',
                buttons: true,
            });
        });
    </script>
    @endif
</body>

</html>
