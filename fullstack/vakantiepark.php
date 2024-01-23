<!DOCTYPE html>
<html lang="nl">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        nav {
            background-color: #333;
            opacity: 0.8;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        a:hover {
            text-decoration: underline;
            color: orange;
            transition-duration: 500ms;
        }

        h1 {
            color: white;
            text-align: center;
            text-decoration: underline;
            margin-bottom: 30px;
            padding-top: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }
        .info {
            padding: 10px;
            box-sizing: border-box;
            width: auto;
            margin: 5px;

        }
        ul li {
            list-style: none;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        div {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: fit-content;
        }

        img {
            max-width: 100%;
            height: 300px;
            margin-bottom: 20px; 
            border-radius: 5PX;
        }

        strong {
            color: #007BFF;
            font-size: 1.2em;
        }

        p strong {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Vakantiepark</h1>
        <a href="adminindex.php" title="Ga naar admin pagina">Admin</a>
    </nav>
    <div class="info">
        <ul>
        <li><h2>Welkom om mijn vakantiepark website, u kunt hier alle bungalows zien.</h2></li>
        </ul>
    </div>
    <?php

    include 'db.php';

    $sqlBungalows = "SELECT * FROM Bungalows";
    $resultBungalows = mysqli_query($conn, $sqlBungalows);

    while ($row = mysqli_fetch_assoc($resultBungalows)):
    ?>
        <div>
            <img src="<?php echo $row['Img']; ?>" alt="Bungalow Image"> 
            <p><strong>Prijs:</strong> <?php echo $row['prijs']; ?></p>
            <p><strong>Type:</strong> <?php echo getTypeNaam($conn, $row['Typen_idTypen']); ?></p> 
            <p><strong>Voorzieningen:</strong></p>
            <p><strong><button name="Koop" value="submit">Koop</button></strong></p>
            <?php
            $bungalowId = $row['idBungalows'];
            $sqlVoorzieningen = "SELECT voorzieningen.naam FROM voorzieningen 
                                JOIN Voorzieningen_has_Bungalows ON voorzieningen.idVoorzieningen = Voorzieningen_has_Bungalows.Voorzieningen_idVoorzieningen
                                WHERE Voorzieningen_has_Bungalows.Bungalows_idBungalows = '$bungalowId'";
            $resultVoorzieningen = mysqli_query($conn, $sqlVoorzieningen);

            while ($voorzieRow = mysqli_fetch_assoc($resultVoorzieningen)) {
                echo $voorzieRow['naam'] . "<br>";
            }
            ?>
        </div>
    <?php endwhile; ?>
</body>
</html>
