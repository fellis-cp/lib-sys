
<?php 
    Class Model{
 
        private $server = "localhost";
        private $username = "root";
        private $password;
        private $db = "testingdb";
        private $conn;
 
        public function __construct(){
            try {
                 
                $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
            } catch (Exception $e) {
                echo "connection failed" . $e->getMessage();
            }
        }
 
        public function insert(){
 
            if (isset($_POST['submit'])) {
                if (isset($_POST['judulbuku']) && isset($_POST['penulis']) && isset($_POST['penerbit']) && isset($_POST['isbn'])) {
                    if (!empty($_POST['judulbuku']) && !empty($_POST['penulis']) && !empty($_POST['penerbit']) && !empty($_POST['isbn']) ) {
                         
                        $judulbuku = $_POST['judulbuku'];
                        $penerbit = $_POST['penerbit'];
                        $penulis = $_POST['penulis'];
                        $isbn = $_POST['isbn'];
 
                        $query = "INSERT INTO user_tbl (judulbuku,penulis,penerbit,isbn) VALUES ('$judulbuku','$penulis','$penerbit','$isbn')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>alert('records added successfully');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                        }else{
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                        }
 
                    }else{
                        echo "<script>alert('empty');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                }
            }
        }
 
        public function fetch(){
            $data = null;
 
            $query = "SELECT * FROM user_tbl";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM user_tbl where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
 
        public function fetch_single($id){
 
            $data = null;
 
            $query = "SELECT * FROM user_tbl WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM user_tbl WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE user_tbl SET judulbuku='$data[judulbuku]', penulis='$data[penulis]', penerbit='$data[penerbit]', isbn='$data[isbn]' WHERE id='$data[id] '";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
    }
 ?>