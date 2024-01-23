<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Contact Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.burger {
    display: none;
    cursor: pointer;
    padding: 10px;
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
}

.bar {
    width: 25px;
    height: 3px;
    background-color: #333;
    margin: 4px 0;
}

.menu {
    display: flex;
    justify-content: flex-end;
    background-color: #333;
    color: white;
    position: fixed;
    top: 0;
    right: -250px;
    height: 100%;
    width: 250px;
    transition: 0.5s;
}

.menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    height: 100%;
}

.menu li {
    padding: 15px;
    text-align: right;
}

.contact {
    padding: 20px;
    margin: 50px;
    text-align: center;
}

.contact h1 {
    margin-bottom: 20px;
}
 .footer{
    padding-top: 20px;
 }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php"><img src="images/bb1.jpg" alt="bungalow logo" style="width: 200px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="due to some problems our services are temoporarily down..">Services</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cc.php">Contact<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="contact">
                    <h1>Contact Us</h1>
                    <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
