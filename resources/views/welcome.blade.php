<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HydroSpice Shop | Fresh Hydroponics and Spices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --brand-900: #123524;
            --brand-700: #1f5f3f;
            --brand-500: #2f8f5b;
            --brand-100: #e7f3eb;
            --text-900: #122119;
            --text-600: #4f6659;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-900);
            background: #f7faf8;
            overflow-x: hidden;
        }

        html, body {
            width: 100%;
            max-width: 100%;
        }

        .top-nav {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid #e6ece8;
        }

        .brand-pill {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--brand-700), var(--brand-500));
            color: #fff;
            font-size: 15px;
        }

        .hero {
            position: relative;
            background-image:
                linear-gradient(110deg, rgba(10, 31, 22, 0.78), rgba(12, 38, 27, 0.55)),
                url('https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=2200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom: 1px solid #e6ece8;
            min-height: calc(100vh - 74px);
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 10% 15%, rgba(97, 181, 139, 0.24), transparent 45%);
            pointer-events: none;
        }

        .hero > .container-fluid {
            position: relative;
            z-index: 1;
        }

        .hero-card {
            border: 1px solid #dfebe4;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 12px 28px rgba(18, 53, 36, 0.08);
            backdrop-filter: blur(3px);
        }

        .soft-badge {
            border-radius: 999px;
            padding: .35rem .75rem;
            background: var(--brand-100);
            color: var(--brand-700);
            font-size: .8rem;
            font-weight: 600;
            display: inline-block;
        }

        .section-title {
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .hero .soft-badge {
            background: rgba(255, 255, 255, 0.16);
            color: #e8fff3;
        }

        .hero h1 {
            color: #ffffff;
        }

        .hero .lead {
            color: rgba(236, 247, 240, 0.92) !important;
        }

        .feature-card,
        .product-card {
            border: 1px solid #e2ebe6;
            border-radius: .9rem;
            background: #fff;
            box-shadow: 0 8px 20px rgba(18, 53, 36, 0.06);
            transition: transform .2s ease, box-shadow .2s ease;
            height: 100%;
        }

        .feature-card:hover,
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(18, 53, 36, 0.12);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: .9rem;
            border-top-right-radius: .9rem;
        }

        .stats-wrap {
            background: #fff;
            border: 1px solid #e2ebe6;
            border-radius: 1rem;
        }

        .cta {
            background: linear-gradient(135deg, var(--brand-900), var(--brand-700));
            color: #fff;
            border-radius: 1rem;
        }

        .timeline-step {
            border-left: 3px solid #d9e8df;
            padding-left: 1rem;
        }

        .timeline-step h6 {
            color: var(--brand-700);
            font-weight: 700;
        }

        .testimonial-card,
        .faq-card {
            border: 1px solid #e2ebe6;
            border-radius: .9rem;
            background: #fff;
            box-shadow: 0 8px 20px rgba(18, 53, 36, 0.06);
            height: 100%;
        }

        .footer {
            border-top: 1px solid #dfe9e3;
            color: var(--text-600);
            background: #ffffff;
        }

        .footer a {
            color: var(--text-600);
            text-decoration: none;
        }

        .footer a:hover {
            color: var(--brand-700);
        }

        @media (max-width: 991.98px) {
            .hero {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top top-nav">
        <div class="container-fluid px-4 px-lg-5 py-1">
            <a class="navbar-brand fw-semibold d-flex align-items-center gap-2" href="{{ route('home') }}">
                <span class="brand-pill">HS</span>
                <span>HydroSpice Shop</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="mainNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    @auth
                        @if(Auth::user()->is_admin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-sm btn-success" href="{{ route('register') }}">Create Account</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero py-5 py-lg-6">
        <div class="container-fluid px-4 px-lg-5 py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="soft-badge mb-3">Sustainable Growing. Pure Flavor.</span>
                    <h1 class="display-5 fw-bold mb-3">Professional hydroponics supplies and premium spice essentials.</h1>
                    <p class="lead text-secondary mb-4">
                        Equip your home or business with reliable hydroponic systems, fresh herb seedlings, and quality spice products.
                        Everything curated for consistency, freshness, and long-term yield.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#featured-products" class="btn btn-success btn-lg">Shop Featured Products</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-lg">Go to Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg">Get Started</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-card p-4">
                        <h5 class="fw-semibold mb-3">Why professionals choose HydroSpice</h5>
                        <ul class="list-unstyled mb-0 text-secondary">
                            <li class="mb-2">- Carefully selected hydroponic kits for all experience levels</li>
                            <li class="mb-2">- Healthy seedlings and quality-tested spice products</li>
                            <li class="mb-2">- Fast support through your account dashboard and messaging</li>
                            <li class="mb-0">- Transparent pricing and dependable stock updates</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="stats-wrap p-4 p-lg-5">
                <div class="row text-center g-4">
                    <div class="col-6 col-lg-3">
                        <h3 class="fw-bold mb-1">10K+</h3>
                        <p class="mb-0 text-secondary">Products Delivered</p>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h3 class="fw-bold mb-1">1,200+</h3>
                        <p class="mb-0 text-secondary">Active Growers</p>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h3 class="fw-bold mb-1">99%</h3>
                        <p class="mb-0 text-secondary">Order Accuracy</p>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h3 class="fw-bold mb-1">24/7</h3>
                        <p class="mb-0 text-secondary">Customer Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <p class="soft-badge mb-2">Core Categories</p>
                    <h2 class="section-title mb-0">Built for efficient growing and better flavor</h2>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <h5 class="fw-semibold mb-2">Hydroponic Systems</h5>
                        <p class="mb-0 text-secondary">Scalable solutions from starter kits to advanced setups for continuous home production.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <h5 class="fw-semibold mb-2">Herb Seedlings</h5>
                        <p class="mb-0 text-secondary">Vigorous basil, mint, rosemary, and more, selected for strong adaptation and growth.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <h5 class="fw-semibold mb-2">Premium Spices</h5>
                        <p class="mb-0 text-secondary">Clean, aromatic spice selections that keep quality, consistency, and freshness first.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-products" class="pb-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <p class="soft-badge mb-2">Top Picks</p>
                    <h2 class="section-title mb-0">Featured products</h2>
                </div>
            </div>

            <div class="row g-4">
                @if(!empty($featuredFallback) && $featuredFallback)
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">
                            Showing demo featured products while the database connection is unavailable.
                        </div>
                    </div>
                @endif
                @forelse($featuredProducts as $product)
                    <div class="col-md-4">
                        <article class="product-card">
                            @php
                                $image = $product->image
                                    ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image))
                                    : 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=900&q=70';
                            @endphp
                            <img src="{{ $image }}" class="w-100 product-img" alt="{{ $product->name }}">
                            <div class="p-4">
                                <h5 class="fw-semibold">{{ $product->name }}</h5>
                                <p class="text-secondary mb-3">{{ \Illuminate\Support\Str::limit($product->description ?? 'Fresh and quality product for your garden and kitchen.', 90) }}</p>
                                @if(!empty($product->slug))
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-success w-100">View Product</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn btn-success w-100">Get Started</a>
                                @endif
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="product-card p-4 p-lg-5 text-center">
                            <h5 class="fw-semibold mb-2">No featured products yet</h5>
                            <p class="text-secondary mb-3">Add products from the admin panel and they will appear here automatically.</p>
                            @auth
                                @if(Auth::user()->is_admin)
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                            @endauth
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <p class="soft-badge mb-2">How It Works</p>
                    <h2 class="section-title mb-0">From signup to first harvest in 3 simple steps</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="timeline-step">
                        <h6>Step 1 - Create your account</h6>
                        <p class="mb-0 text-secondary">Register in minutes and access a personalized dashboard for orders and support.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="timeline-step">
                        <h6>Step 2 - Choose your setup</h6>
                        <p class="mb-0 text-secondary">Pick hydroponic kits, seedlings, and spice essentials tailored to your goals.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="timeline-step">
                        <h6>Step 3 - Grow and reorder easily</h6>
                        <p class="mb-0 text-secondary">Track purchases, message support, and reorder top-performing products anytime.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <div>
                            <p class="soft-badge mb-2">Customer Stories</p>
                            <h2 class="section-title mb-0">What growers say</h2>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <article class="testimonial-card p-4">
                                <p class="mb-2">"We cut supply waste by 30% after switching to HydroSpice kits and recurring restocks."</p>
                                <small class="text-secondary">Amina K., Restaurant Owner</small>
                            </article>
                        </div>
                        <div class="col-12">
                            <article class="testimonial-card p-4">
                                <p class="mb-2">"Seedling quality is consistently strong and support replies fast when we need help."</p>
                                <small class="text-secondary">David O., Home Grower</small>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <div>
                            <p class="soft-badge mb-2">Need Help?</p>
                            <h2 class="section-title mb-0">Frequently asked questions</h2>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <article class="faq-card p-4">
                                <h6 class="fw-semibold mb-2">Do you ship nationwide?</h6>
                                <p class="mb-0 text-secondary">Yes, we deliver across major regions with live stock and delivery updates.</p>
                            </article>
                        </div>
                        <div class="col-12">
                            <article class="faq-card p-4">
                                <h6 class="fw-semibold mb-2">Can beginners use your hydroponic kits?</h6>
                                <p class="mb-0 text-secondary">Absolutely. Starter kits include essentials and guidance for first-time growers.</p>
                            </article>
                        </div>
                        <div class="col-12">
                            <article class="faq-card p-4">
                                <h6 class="fw-semibold mb-2">How do I get support for an order?</h6>
                                <p class="mb-0 text-secondary">Log in and open a message from your dashboard for direct support assistance.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container-fluid px-4 px-lg-5">
            <div class="cta p-4 p-lg-5 d-lg-flex align-items-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-2">Start growing smarter today</h3>
                    <p class="mb-0 text-white-50">Join HydroSpice and manage your orders, favorites, and support in one place.</p>
                </div>
                <div class="mt-3 mt-lg-0">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg">Open Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">Create Free Account</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <footer class="footer pt-5 pb-4">
        <div class="container-fluid px-4 px-lg-5">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-2">HydroSpice Shop</h5>
                    <p class="mb-2">Reliable hydroponic supplies and premium spices for homes and businesses.</p>
                    <small>Grow Smart. Eat Fresh.</small>
                </div>
                <div class="col-6 col-md-2">
                    <h6 class="fw-semibold mb-2">Shop</h6>
                    <ul class="list-unstyled mb-0 d-grid gap-1">
                        <li><a href="#featured-products">Featured</a></li>
                        <li><a href="#">Hydroponic Kits</a></li>
                        <li><a href="#">Seedlings</a></li>
                        <li><a href="#">Spices</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6 class="fw-semibold mb-2">Account</h6>
                    <ul class="list-unstyled mb-0 d-grid gap-1">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('messages.index') }}">Support Messages</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-semibold mb-2">Contact</h6>
                    <ul class="list-unstyled mb-0 d-grid gap-1">
                        <li>Email: support@hydrospice.local</li>
                        <li>Phone: +234 800 000 0000</li>
                        <li>Hours: Mon-Sat, 8am-7pm</li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 border-top pt-3">
                <p class="mb-0">© {{ date('Y') }} HydroSpice Shop. All rights reserved.</p>
                <small>Privacy Policy | Terms of Service</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
