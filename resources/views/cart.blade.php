    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MiniShop - Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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
        </style>
    </head>

    <body>

        {{-- Navbar --}}
        <nav>
            <div class="navbar px-4">
                <h2>MiniMart</h2>
                <ul class="mb-0">
                    @auth
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <h2>Your Cart</h2>

            @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                    @php
                    $subtotal = $item->product->price * $item->quantity;
                    $total += $subtotal;
                    @endphp
                    <tr>
                        <td><span class="fs-3">{{ $item->product->name }}</span><br><small>{{ $item->product->description }}</small></td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->product->price) }}</td>
                        <td>₹{{ number_format($subtotal) }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <form method="POST" action="{{ route('cart.remove', $item->product_id) }}" class="mx-4">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </form>

                                <form method="POST" action="{{ route('cart.decrease', $item->product_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">-</button>
                                </form>

                                <span class="mx-2 fw-bold" style="min-width: 30px; text-align: center;">{{ $item->quantity }}</span>

                                <form method="POST" action="{{ route('cart.add', $item->product_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">+</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total:</td>
                        <td colspan="2" class="fw-bold">₹{{ number_format($total) }}</td>
                    </tr>
                </tbody>
            </table>

            <form method="POST" action="{{ route('purchase') }}">
                @csrf
                <button class="btn btn-success">Buy Now</button>
            </form>
            @endif
        </div>

    </body>

    </html>