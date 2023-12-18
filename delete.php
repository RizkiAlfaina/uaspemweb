<?php
if (isset($_GET["nim"])){
    $nim = $_GET["nim"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nama_mhs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM mhs where nim=$nim";
    $conn->query($sql);
}

header("location: index.php");
exit;
?>