<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container .form-group {
            margin-bottom: 20px;
        }

        .login-container .form-control {
            border-radius: 4px;
        }

        .login-container button {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container .forgot-password {
            text-align: right;
            font-size: 14px;
        }

        .login-container .register-link {
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>

<body>

    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('login.form') }}" method="POST">
            @csrf
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                    required>
            </div>



            <button type="submit" class="btn btn-primary btn-block">Sign In</button>


        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="/register">Sign Up</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
