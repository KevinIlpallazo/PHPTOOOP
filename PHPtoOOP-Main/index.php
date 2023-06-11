<?php
require_once 'connection.php';
require_once 'functions.php';

$connObj = new Connection();
$conn = $connObj->getConnection();

$functions = new Functions($conn);

session_start();
// if ($_SESSION['status'] =="login"){
   if (!isset($_SESSION['username'])){
    header("Location: index.php");

   }
   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $nilai6 = $_POST['nilai6'];

    $functions->insertData($nama, $nis, $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);

    $total = $functions->Total($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $rata = $functions->Rata($total);
    $max = $functions->cariMax($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $min = $functions->cariMin($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $grade = $functions->cariGrade($rata);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
</head>
<style>
body{
    background-color: #374259;
    color: #E8F6EF;
}

/* Style untuk container form login */
.container {
  width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #454545;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style untuk judul form */
.container h2 {
  text-align: center;
  margin-bottom: 20px;
}

/* Style untuk input field */
.container input[type="text"],
.container input[type="number"] {
  width: 70%;
  padding: 4px 20px;
  margin: 7px 0px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  background-color: #454545;
  color: #E8F6EF;
}

/* Style untuk tombol login */
.container button {
  background-color: #5C8984;
  color: #E8F6EF;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 82%;
}

.log{
    
}

/* Style untuk tombol hover */
.button:hover {
  opacity: 0.8;
}

</style>
<body>
    <form action="" method="POST">
        <center>
            <div class="container">
                <h2>Silahkan Isi Daftar Berikut</h2>
                <hr><br>
                <label>Nama</label><br>
                <input type="text" name="nama" required><br>
                <label>NIS</label><br>
                <input type="text" name="nis" required><br>
                <label for="nilai1">PIPAS</label><br>
                <input type="number" name="nilai1" min="0" max="100" required><br>
                <label for="nilai2">PJOK</label><br>
                <input type="number" name="nilai2"min="0" max="100"  required><br>
                <label for="nilai3">B.inggris</label><br>
                <input type="number" name="nilai3" min="0" max="100" required><br>
                <label for="nilai4">B.indo</label><br>
                <input type="number" name="nilai4" min="0" max="100" required><br>
                <label for="nilai5">MTK</label><br>
                <input type="number" name="nilai5" min="0" max="100" required><br>
                <label for="nilai6">PAIBP</label><br>
                <input type="number" name="nilai6" min="0" max="100" required><br>
                <br>
                    <button type="submit" name="submit">Submit</button>
                </center>
            </div>
        </form>
        
        <br><br><br>
        
        <center>
            <?php if (isset($total)) : ?>
                <h2>Hasil Perhitungan</h2>
                <hr><br>
                <p>Nilai Total: <?php echo $total; ?></p>
                <p>Nilai Rata-Rata: <?php echo $rata; ?></p>
                <p>Nilai Maksimum: <?php echo $max; ?></p>
                <p>Nilai Minimum: <?php echo $min; ?></p>
                <p>Nilai Grade: <?php echo $grade; ?></p>
                <?php endif; ?>
                <div class="log">
                    <a href="logout.php"><button type="button">Logout</button></a> 
                </div>
    </center>
</body>
</html>