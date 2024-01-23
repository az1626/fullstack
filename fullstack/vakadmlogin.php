    <?php

    include('db.php');

    session_start(); 

    $errorMsg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE Gebruikersnaam = ? AND Password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $_SESSION['loggedin'] = true;       
            header("Location: adminindex.php");
            exit();
        } else {
            $errorMsg = "Verkeerde gebruikersnaam of wachtwoord ingevoerd";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url('images/Vakantiepark.jpg'); 
                background-size: cover;
                background-repeat: no-repeat;   
                background-position: center;
                margin: 0;
                padding: 0;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .container {
                max-width: 400px;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.9); 
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            input {
                width: 100%;
                padding: 10px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            button {
                background-color: #4caf50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }
            .error-message {
                color: red;
                margin-top: 10px;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Admin Login</h2>
            <form action="vakadmlogin.php" method="post">
                <label for="username"><b>Gebruikersnaam</b></label>
                <input type="text" placeholder="Voer gebruikersnaam in" name="username" required>

                <label for="password"><b>Wachtwoord</b></label>
                <input type="password" placeholder="Voer wachtwoord in" name="password" required>

                <button type="submit">Login</button>


                <div class="error-message"><?php echo $errorMsg; ?></div>
            </form>
        </div>
    </body>
    </html>
