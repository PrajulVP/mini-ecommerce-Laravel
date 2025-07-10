<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MiniShop - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
        }

        nav {
            background-color: #800080;
            padding: 10px 40px;
            color: white;
        }

        nav .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            padding-left: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .container {
            margin-top: 40px;
        }

        .text-purple {
            color: #800080;
        }

        .btn-purple {
            background-color: #800080;
            color: #fff;
            border: none;
        }

        .btn-purple:hover {
            background-color: #5d005d;
            color: #fff;
        }

        .custom-col {
            flex: 0 0 20%;
            max-width: 20%;
        }

        @media (max-width: 992px) {
            .custom-col {
                flex: 0 0 33.33%;
                max-width: 33.33%;
            }
        }

        @media (max-width: 768px) {
            .custom-col {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 576px) {
            .custom-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav>
        <div class="navbar px-4">
            <h2>MiniMart</h2>
            <ul class="mb-0">
                @auth
                <li><a href="{{ route('cart') }}">Cart</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center">
            @auth
            Welcome, {{ Auth::user()->name }}
            @endauth
        </h1>
    </div>

    {{-- Main Content --}}
    <div class="row container mt-5 mx-auto">
        @foreach ($products as $product)
        <div class="col custom-col mb-4">
            <div class="card h-100 d-flex flex-column">
                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top img-fluid" alt="Product Image" style="height: 200px; width: 100%;" />
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <h6 class="card-title">{{ $product->description }}</h6>
                    <p class="card-text">₹{{ number_format($product->price) }}</p>
                    <p class="text-muted mb-4">
                        @if ($product->stock > 0)
                        In Stock: {{ $product->stock }}
                        @else
                        <span class="text-danger fs-4 fw-bold">Out of Stock</span>
                        @endif
                    </p>

                    @auth
                    @if ($product->stock > 0)
                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-purple">Add to Cart</button>
                    </form>
                    @else
                    <button class="btn btn-secondary mt-auto" disabled>Out of Stock</button>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary mt-auto">Add to Cart</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>