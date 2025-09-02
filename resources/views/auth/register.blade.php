<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body{
            background:  #6AA3B3;
        }
        .container{
            margin-top: 100px;
        }
        .card-header, .card-footer {
            background-color:#1B5869;
            color: white;
        }
        .btn-primary-custom {
            background-color:#1B5869;
            color:white;
        }
        .btn-primary-custom:hover {
            background-color:#17a2b8;
            color:white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center">
                    <h3>Create an Account</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">PL.No</label>
                            <input type="text" name="pl_no" class="form-control" value="{{ old('pl_no') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="">Select Role</option>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Developer" {{ old('role') == 'Developer' ? 'selected' : '' }}>Developer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Sign Up</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>
                        Already have an account? <a href="{{ route('login') }}" class="text-white">Sign In</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
