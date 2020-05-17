<html>
<head>
    <meta charset="utf-8">
    <meta name="viewer" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <title> @yield('title') </title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header tex-center">
                        <h2> @yield('judul_halaman') </h2>
                    </div>
                    <div class="card-body">
                        @yield('konten')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>