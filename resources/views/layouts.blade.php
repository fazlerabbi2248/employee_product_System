<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee and Product Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div style="display: flex;">
        <!-- Sidebar -->
        <div style="width: 300px; background-color: #333; color: #fff; height: 100vh;">
            <div style="padding: 30px;"></div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-info text-white">Dashboard</a>
                <a href="{{ route('employees.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Employees</a>
                <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Products</a>
            </div>
        </div>

        <!-- Page Content -->
        <div style="flex: 1;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-white text-dark border-bottom">
                <button class="btn btn-dark" id="menu-toggle">Employee and Product Management System</button>
            </nav>

            <div class="container-fluid">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Toggle the sidebar
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>
