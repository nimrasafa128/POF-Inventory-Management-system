

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1b2a; /* Dark Navy */
            color: #ffffff;
        }
        .navbar {
            background-color: #1b263b; /* Darker Blue */
        }
        .navbar .nav-link, .navbar-brand {
            color: #ffffff !important;
        }
        .navbar .nav-link.active {
            color: #1e90ff !important; /* Dodger Blue highlight */
        }
        .card {
            background-color: #1b263b;
            border: none;
            border-radius: 12px;
        }
        .card h4 {
            color: #1e90ff;
        }
        .btn-custom {
            background-color: #1e90ff;
            color: #fff;
            border-radius: 30px;
        }
        .btn-custom:hover {
            background-color: #0b70d6;
            color: #fff;
        }
        footer {
            background-color: #1b263b;
            color: #aaa;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand fw-bold" href="/">Inventory System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link active" href="{{ route('about') }}">About</a></li>
                <li><a class="nav-link" href="{{ route('softwares') }}">Softwares</a></li>
                <li><a class="nav-link" href="{{ route('tender') }}">Tender</a></li>
                <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- About Content -->
    <div class="container py-5">
        <h1 class="fw-bold text-center mb-5" style="color: #1e90ff;">About Our Inventory Management System</h1>
        
        <p class="fs-5 mb-5 text-center">
            Our <strong>Inventory Management System</strong> helps businesses streamline stock tracking, 
            warehouse operations, and reporting. With a simple, clean UI and powerful backend built on Laravel, 
            it ensures you never lose sight of your inventory.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 text-center h-100 shadow">
                    <h4>Efficiency</h4>
                    <p>Manage your stock in seconds with automated workflows and real-time updates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center h-100 shadow">
                    <h4>Real-time Insights</h4>
                    <p>Instant reporting and dashboards help you make better business decisions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center h-100 shadow">
                    <h4>Scalable</h4>
                    <p>Perfect for small businesses and enterprises alike. Grow with confidence.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('contact') }}" class="btn btn-lg btn-custom px-4">Contact Us</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Inventory Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
