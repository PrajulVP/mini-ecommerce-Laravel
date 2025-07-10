<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MiniShop</title>
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
        <h2 class="text-center mb-4">Register for MiniShop</h2>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" name="name" class="form-control border-3" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="email" name="email" class="form-control border-3" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="number" name="phone" class="form-control border-3">
            </div>

            <div class="mb-3">  
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" class="form-control border-3"></textarea>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control border-3" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="form-control border-3" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-purple">Register</button>
            </div>
        </form>

        <p class="text-center mt-3">Already have an account?
            <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
</div>

</body>
</html>
