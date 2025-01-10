<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Inventory Management</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
        }

        .navbar {
            background: transparent;
            padding: 20px 50px;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #6c63ff;
        }

        .navbar-nav a {
            margin-left: 20px;
            color: #333;
            font-weight: 500;
        }

        .navbar-nav a.btn {
            background: #6c63ff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            color: white;
            text-align: left;
            padding: 100px 50px;
            position: relative;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-learn {
            background: white;
            color: #6c63ff;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: bold;
        }

        .hero-image img {
            width: 100%;
            max-width: 450px;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: url('https://svgshare.com/i/oZx.svg') no-repeat;
            background-size: cover;
        }

        .features {
            padding: 60px 20px;
            background: white;
            text-align: center;
        }

        .features h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .features .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        footer {
            background: #6c63ff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">INVENTARIS</a>
    </nav>

    <div class="hero">
        <div class="hero-text">
            <h1>Simplify Your Inventory Management</h1>
            <p>Manage your inventory seamlessly with state-of-the-art tools and real-time analytics.</p>
            <a href="/login" class="btn btn-learn">Get Started</a>
        </div>
        <div class="hero-image">
            <img src="https://via.placeholder.com/450" alt="Inventory Illustration">
        </div>
        <div class="wave"></div>
    </div>

    <section class="features">
        <h2>Why Choose Us?</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-title">Real-Time Updates</h5>
                        <p>Stay informed with live inventory data to make accurate decisions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-title">Streamlined Reporting</h5>
                        <p>Generate custom reports to gain actionable insights.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-title">Seamless Collaboration</h5>
                        <p>Work effortlessly with your team to stay ahead.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Your Website. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
