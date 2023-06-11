<?php 
include "koneksi_mysqli.php";
session_start();
// if ($_SESSION['status'] =="login"){
   if (!isset($_SESSION['username'])){
    header("Location: login.php");

   }
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>dashboard</title>
            <link href="mata.png" rel="shortcut icon">
            
</head>
<body style="background-color:#CDC2AE; margin-top:240px;">
<?php
require_once 'connect.php';
require_once 'fungsi.php';

$connObj = new Connection();
$conn = $connObj->getConnection();

$functions = new Functions($conn);

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

<body>
    <form action="" method="POST">
        <center>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
    <style>
        body {
            background-color: #f2babd;
            margin-top: 240px;
            font-family: Arial, sans-serif;
        }
        
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        h2 {
            text-align: center;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .result {
            margin-top: 50px;
        }
        
        .result h2 {
            margin-bottom: 20px;
        }
        
        .result p {
            margin-bottom: 10px;
        }
        
        a {
            font-size: 30px;
            text-decoration: none;
            color: #fff;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    // PHP code here...
    ?>
</body>
</html>
            <h1>Daftar Pengisian Nilai</h1>
            <br>
            <div class="container">
                <h2>Silahkan Isi Format Berikut</h2>
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
                <div class="button">
                    <button type="submit" name="submit">Submit</button>
                </div>
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
    </center>
    <center><h5><a href="logout.php" style="font-size:30px;text-decoration:none; color:#080202;">keluar</a></h5> 
        </center>      
</body>
</html>
</body>
</html>
<?php //} else { ?>
<center ><h1 style="font-size: 90px;"></h1></center>
 <?php //} ?>