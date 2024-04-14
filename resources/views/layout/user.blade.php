<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Products</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand ps-3 text-white" href="{{ route('homepage') }}">Products</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                <div class="collapse navbar-collapse" id="mynavbar">
                    <div class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary px-5 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i>
                                {{ auth()->user()->name }} <!-- Display the user's name here -->
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('createpage') }}">Add Product</a></li>
                            <li><a class="dropdown-item" href="{{ route('tables') }}">Products</a></li>
                            <li><a class="dropdown-item" href="{{ route('landing') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </nav>

    @yield('main')

</body>
</html>