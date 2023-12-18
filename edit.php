<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "nama_mhs";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$nim = "";
$nama = "";
$prodi = "";
$email = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["nim"])) {
        header("location: index.php");
        exit;
    }

    $nim = $_GET["nim"];

    $sql = "SELECT * FROM mhs WHERE nim=$nim";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }

    $nama = $row["nama"];
    $prodi = $row["prodi"];
} else {

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];

    do {
        if (empty($nim) || empty($nama) || empty($prodi) || empty($email)) {
            $errorMessage = "Kolom tidak boleh kosong";
            break;
        }

        $sql = "UPDATE mhs" .
            " SET nama='$nama', prodi='$prodi', email='$email'" .
            " WHERE nim=$nim";
        $result = $conn->query($sql);
        if (!$result) {
            $errorMessage = "invalid" . $conn->error;
            break;
        }

        $successMessage = "update berhasil";

        header("location: index.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 7 Tugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>Edit Data </h2>

        <?php
        if (!empty($errorMessage)) {
            echo "<p style='color: red'>" . $errorMessage . "</p>";
        }
        ?>
        <form method="post">
            <!-- Add the name attribute to the hidden input -->
            <input type="hidden" name="nim" value="<?php echo $nim; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="nim" value="<?php echo $nim; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prodi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prodi" value="<?php echo $prodi; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>   
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "<p style='color: green'>" . $successMessage . "</p>";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
