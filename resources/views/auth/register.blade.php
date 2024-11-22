<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom Style -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            padding: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .terms {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #007bff;
        }

    </style>
</head>

<body>

    <div class="card">
        <h3 class="card-title">Sign Up</h3>
        <form action="{{ route('submit.form') }}" method="POST">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email ID"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="" selected disabled>Select Role</option>
                   
                    <option value="author">Author</option>
                    <option value="visitor">Visitor</option>
                </select>
            </div>



            <button type="submit">Sign Up</button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="/login">Sign In here</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
