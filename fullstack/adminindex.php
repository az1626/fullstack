    <?php
    include 'db.php';

    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: vakadmlogin.php');
        exit;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prijs = $_POST['prijs'];
        $typeId = $_POST['type'];
        $img = $_POST['img'];
    

        $stmt = $conn->prepare("INSERT INTO Bungalows (prijs, Typen_idTypen, Img) VALUES (?, ?, ?)");
        

        $stmt->bind_param("sss", $prijs, $typeId, $img);
         

        $stmt->execute();
        

        $bungalowId = $stmt->insert_id;
        

        $stmt->close();


        if (isset($_POST['voorzieningen']) && !empty($_POST['voorzieningen'])) {
            $selectedVoorzieningen = $_POST['voorzieningen'];


            foreach ($selectedVoorzieningen as $voorzieningId) {
                $insertVoorzieningen = "INSERT INTO Voorzieningen_has_Bungalows (Voorzieningen_idVoorzieningen, Bungalows_idBungalows) VALUES ('$voorzieningId', '$bungalowId')";
                mysqli_query($conn, $insertVoorzieningen);
            }
        }

        header("Location: adminindex.php");
        exit();
    }

    $checkVoorzieningenBestaandQuery = "SELECT COUNT(*) FROM voorzieningen";
    $resultBestaand = mysqli_query($conn, $checkVoorzieningenBestaandQuery);
    $rowBestaand = mysqli_fetch_array($resultBestaand);

    if ($rowBestaand[0] == 0) {
        $voorzieningenNamen = ['openhaard', 'magnetron', 'wasmachine', 'ligbad'];

        foreach ($voorzieningenNamen as $naam) {
            $insertVoorziening = "INSERT INTO voorzieningen (naam) VALUES ('$naam')";
            mysqli_query($conn, $insertVoorziening);
        }
    }

    $sqlTypes = "SELECT * FROM typen";
    $resultTypes = mysqli_query($conn, $sqlTypes);

    $sqlVoorzieningen = "SELECT * FROM voorzieningen";
    $resultVoorzieningen = mysqli_query($conn, $sqlVoorzieningen);
    ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>

    </head>
    <body>
        <h1>Admin Pagina - Bungalow Toevoegen</h1>

        <form action="adminindex.php" method="post">
        
            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <?php while ($row = mysqli_fetch_assoc($resultTypes)): ?>
                    <option value="<?php echo $row['idTypen']; ?>"><?php echo $row['naam']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="img">Image URL:</label>
            <input type="text" id="img" name="img" required>

            <br>
            <label>Voorzieningen:</label>
            <?php while ($row = mysqli_fetch_assoc($resultVoorzieningen)): ?>
                <input type="checkbox" name="voorzieningen[]" value="<?php echo $row['idVoorzieningen']; ?>">
                <?php echo $row['naam']; ?><br>
            <?php endwhile; ?>

            <button type="submit">Toevoegen</button>
        </form>
    </body>
    </html>
