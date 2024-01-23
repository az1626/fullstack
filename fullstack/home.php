<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bungalow Sales</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}

body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    color: #333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    
}


.header {
    background-color: #333;
    padding: 20px;
    text-align: center;
    color: #fff;
    
}

.navbar {
    display: flex;
    justify-content: center;
}

.nav-list {
    list-style-type: none;
    display: flex;
}

.nav-link {
    color: #fff;
    text-decoration: none;
    margin: 0 20px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.nav-link.active {
    color: #ff6600;
}
.nav-link:hover {
    box-shadow: inset 100px 0 0 0 #e77c18;
    color: white;
}
.background-image {
    background-image: url('images/hpimg.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center top; 
}

.main-section {
    background-color: #fff;
    padding: 50px;
    text-align: center;
    flex-grow: 1;
    
}

.section-title {
    font-size: 36px;
    margin-bottom: 20px;
    color: #333;
    
}

.section-description {
    color: #555;
    margin-bottom: 30px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #ff9900;
}


.info-section {
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 50px;
    background-color: #fff;
    text-align: center;
}

.info-box {
    flex: 1;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.footer {
    background-color: #333;
    padding: 20px;
    color: #fff;
    text-align: center;
}

.footer-link {
    color: #ff6600;
    text-decoration: none;
    font-weight: bold;
}
    </style>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="home.php" class="nav-link active">Home</a></li>
                <li><a href="index.php" class="nav-link">Bungalows</a></li>
                <li><a href="cc.php" class="nav-link">Contact</a></li>
            </ul>
        </nav>
        <h1 class="site-title">Welcome to Bungalow Bros</h1>
    </header>

    <section class="main-section">
        <h2 class="section-title">Find Your Dream Bungalow</h2>
        <p class="section-description">Discover the perfect bungalow for your lifestyle.</p>
        <a href="index.php" class="btn btn-primary">Browse Bungalows</a>
    </section>

    <section class="info-section">
        <div class="info-box">
            <h3>Quality Bungalows</h3>
            <p>Our bungalows are built with the highest quality materials and craftsmanship.</p>
        </div>
        <div class="info-box">
            <h3>Expert Agents</h3>
            <p>Our team of experienced agents will guide you through the entire buying process.</p>
        </div>
        <div class="info-box">
            <h3>Great Locations</h3>
            <p>Our bungalows are located in prime areas with beautiful surroundings.</p>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2023 Bungalow Sales. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@bungalowsales.com" class="footer-link">info@bungalowsales.com</a></p>
    </footer>
</body>
</html>
