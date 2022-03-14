<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anemone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="m-4">
        <nav class="navbar navbar-expand-sm navbar-light bg-info">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">ANEMONE</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <form action="{{ route('index') }}" method="get">
                                <button type="submit">Documents</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Profile</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Groups</a>
                                <a href="#" class="dropdown-item">History</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>