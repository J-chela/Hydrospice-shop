<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HydroSpice Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f8f2;
            font-family: 'Poppins', sans-serif;
        }
        header {
            background-color: #2e7d32;
            color: white;
            padding: 1rem 0;
            text-align: center;
            position: relative;
        }
        .auth-links {
            position: absolute;
            top: 15px;
            right: 25px;
        }
        .auth-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: 500;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
        .product-card {
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        footer {
            background-color: #2e7d32;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<header>
    <h1>🌿 HydroSpice Shop</h1>
    <p>Buy hydroponic equipment, herb seedlings, and spice products</p>

    {{-- ✅ Authentication / Admin / Dashboard Links --}}
    <div class="auth-links">
        @auth
            @if(Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
            @else
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endif
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link text-white p-0 m-0" style="text-decoration: underline;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</header>

<div class="container my-5">
    <div class="text-center mb-4">
        <h2>Our Products</h2>
        <p>Explore our hydroponic kits, herbs, and spices</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Hydroponic Kit">
                <div class="card-body text-center">
                    <h5 class="card-title">Hydroponic Starter Kit</h5>
                    <p class="card-text">Perfect for beginners who want to grow herbs at home.</p>
                    <button class="btn btn-success">Buy Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Herb Seedlings">
                <div class="card-body text-center">
                    <h5 class="card-title">Herb Seedlings</h5>
                    <p class="card-text">Fresh basil, mint, rosemary, and more!</p>
                    <button class="btn btn-success">Buy Now</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card product-card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Spice Powder">
                <div class="card-body text-center">
                    <h5 class="card-title">Spice Powders</h5>
                    <p class="card-text">Garlic, turmeric, and ginger — fresh and organic.</p>
                    <button class="btn btn-success">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>© 2025 HydroSpice Shop | Grow Smart, Eat Fresh 🌱</p>
</footer>

</body>
</html>
