<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "nama_mhs";

$conn = new mysqli($servername, $username, $password, $database);

$nim = "";
$nama = "";
$prodi = "";
$email = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];

    do {
        if (empty($nim) || empty($nama) || empty($prodi) || empty($email)) {
            $errorMessage = "Kolom tidak boleh kosong";
            break;
        }

        $checkSql = "SELECT COUNT(*) as count FROM mhs WHERE nim='$nim'";
        $checkResult = $conn->query($checkSql);
        $checkRow = $checkResult->fetch_assoc();

        if ($checkRow['count'] > 0) {
            $errorMessage = "NIM sudah ada, pilihlah yang lain";
            break;
        }

        $sql = "INSERT INTO mhs (nim, nama, prodi, email)" .
            "VALUES ('$nim', '$nama', '$prodi', '$email')";
        $result = $conn->query($sql);

        $nim = "";
        $nama = "";
        $prodi = "";
        $email = "";

        $successMessage = "Masuk kok datanya";

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

    <script>
    function validateForm() {
        var nim = document.forms["myForm"]["nim"].value;
        var email = document.forms["myForm"]["email"].value;

        if (nim == "") {
            alert("NIM harus terisi");
            return false;
        }

        if (email == "") {
            alert("Email harus terisi");
            return false;
        }

        var confirmSubmission = confirm("Apakah yakin untuk memasukkan data?");

        return confirmSubmission;
    }
</script>
</head>
<body>
    <div class="container my-5">
        <h2>Buat Data </h2>

        <?php
        if (!empty($errorMessage)) {
            echo "<p style='color: red'>" . $errorMessage . "</p>";
        }
        ?>
        <form method="post" name="myForm" onsubmit="return validateForm()">
            <!-- Your form fields -->
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
                <label class="col-sm-3 col-form-label">E-mail</label>
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
