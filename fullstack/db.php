<?php
$host = "localhost";
$username = "root";
$password = "AymanZerDB";
$database = "vakantiepark";

$conn = mysqli_connect($host, $username, $password, $database);

function getTypeNaam($conn, $typeId) {
    $sqlType = "SELECT naam FROM typen WHERE idTypen = '$typeId'";
    $resultType = mysqli_query($conn, $sqlType);


    if ($resultType && mysqli_num_rows($resultType) > 0) {
        $rowType = mysqli_fetch_assoc($resultType);
        return $rowType['naam'];
    } else {

        return 'Onbekend type';
    }
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
