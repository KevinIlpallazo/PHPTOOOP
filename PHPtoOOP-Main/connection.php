<?php 

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query); //menjalankan perintah
    $kotaks = [];
    while ($kotak = mysqli_fetch_assoc($result)) { //menghasilkan data array
        $kotaks[] = $kotak;
    }
    return $kotaks;
}

class Connection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "database_asesment";
    protected $conn;

    public function __construct() {
        $this->conn = $this->connectDB();
    }

    public function connectDB() {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>