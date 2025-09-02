<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:  #6AA3B3;
            font-family: Arial, sans-serif;
        }
        .container{
            margin-top: 250px;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            border-width: medium;
            border-color: white;
            box-shadow: 4px 4px 10px rgba(5, 5, 5, 5);
        }
        .card-header {
            background-color: #6AA3B3;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .form-label {
            font-weight: 500;
            color: #1B5869;
        }
        .btn-primary {
            background-color: #1B5869;
            border: none;
        }
        .btn-primary:hover {
            background-color: #144752;
        }
        .card-footer {
            background-color: #88B3BF;
            color: white;
        }
        a {
            color: white;
            text-decoration: underline;
        }
        a:hover {
            color: #1B5869;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    Sign In
                </div>
                <div class="card-body bg-white">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">PL Number</label>
                            <input type="text" name="pl_no" class="form-control" value="{{ old('pl_no') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
