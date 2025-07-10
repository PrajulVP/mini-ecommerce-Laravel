<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MiniShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .form-container {
            margin-top: 80px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-purple {
            background-color: #800080;
            color: #fff;
        }

        .btn-purple:hover {
            background-color: #5d005d;
        }
    </style>
</head>

<body>

    <div class="container col-md-6">
        <div class="form-container">
            <h2 class="text-center mb-4">Login to MiniShop</h2>
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address:</label>
                    <input type="email" name="email" class="form-control border-3" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control border-3" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-purple">Login</button>
                </div>
            </form>

            <p class="text-center mt-3">Don't have an account?
                <a href="{{ route('register') }}">Register here</a>
            </p>
        </div>
    </div>

</body>

</html>