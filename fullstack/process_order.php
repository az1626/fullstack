<?php
include("database.php");
//klant gegevens voor tabellen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $surename = htmlspecialchars($_POST['surename']);
    $email = $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST["phone"]);
    $address = htmlspecialchars($_POST["adress"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $bungalowId = $_POST['idBungalows'];

//query voor db klanten
    $insertKlantenQuery = "INSERT INTO klanten (voornaam, achternaam, email, telefoonnr, adress, wachtwoorden) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtKlant = mysqli_prepare($conn, $insertKlantenQuery);
//query voor db tabbelen
$insertPurchaseQuery = "INSERT INTO gekochte_bungalows (idBungalow, idKlant) VALUES (?, ?)";
$stmtPurchase = mysqli_prepare($conn, $insertPurchaseQuery);
if ($stmtPurchase) {
    mysqli_stmt_bind_param($stmtPurchase, "ii", $bungalowId, $klantId);

    if (mysqli_stmt_execute($stmtPurchase)) {
        echo "Bungalow $bungalowId successfully purchased.";

        $deleteBungalowQuery = "DELETE FROM bungalows WHERE idBungalows = ?";
        $stmtDeleteBungalow = mysqli_prepare($conn, $deleteBungalowQuery);

        if ($stmtDeleteBungalow) {
            mysqli_stmt_bind_param($stmtDeleteBungalow, "i", $bungalowId);
            mysqli_stmt_execute($stmtDeleteBungalow);
            echo "Bungalow $bungalowId removed from available bungalows.";
        } else {
            echo "Error deleting bungalow: " . mysqli_error($conn);
        }
    } else {
        echo "Error purchasing bungalow: " . mysqli_stmt_error($stmtPurchase);
    }

    mysqli_stmt_close($stmtPurchase);
} else {
    echo "Error preparing purchase statement: " . mysqli_error($conn);
}

    if ($stmtKlant) {
        mysqli_stmt_bind_param($stmtKlant, "ssssss", $firstname, $surename, $email, $phone, $address, $password);

        if (mysqli_stmt_execute($stmtKlant)) {
      
            $idKlant = mysqli_insert_id($conn);


            $idBungalows = $_POST['idBungalows']; 

            $insertBoekingQuery = "INSERT INTO boekingen (idKlant, idBungalows) VALUES (?, ?)";
            $stmtBoeking = mysqli_prepare($conn, $insertBoekingQuery);

            if ($stmtBoeking) {
                mysqli_stmt_bind_param($stmtBoeking, "ii", $idKlant, $idBungalow);

                if (mysqli_stmt_execute($stmtBoeking)) {
                    echo "Purchase successfully completed!<br>";
                } else {
                    echo "Error adding booking details: " . mysqli_stmt_error($stmtBoeking) . "<br>";
                }

                mysqli_stmt_close($stmtBoeking);
            } else {
                echo "Error preparing the booking SQL statement: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Error adding customer details: " . mysqli_stmt_error($stmtKlant) . "<br>";
        }

        mysqli_stmt_close($stmtKlant);
    } else {
        echo "Error preparing the customer SQL statement: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Invalid request method.";
}
$checkPurchaseQuery = "SELECT id FROM gekochte_bungalows WHERE idBungalow = ? AND idKlant = ?";
$stmtCheckPurchase = mysqli_prepare($conn, $checkPurchaseQuery);

if ($stmtCheckPurchase) {
    mysqli_stmt_bind_param($stmtCheckPurchase, "ii", $bungalowId, $idKlant);
    mysqli_stmt_execute($stmtCheckPurchase);
    mysqli_stmt_store_result($stmtCheckPurchase);

    if (mysqli_stmt_num_rows($stmtCheckPurchase) > 0) {
        echo "You have already purchased this bungalow.";
        exit(); 
    }
} else {
    echo "Error checking purchase status: " . mysqli_error($conn);
}
?>
