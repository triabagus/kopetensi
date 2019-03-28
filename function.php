<?php
/**
 * Function for input database connect , input update delete search data in mysql. And login function
 * 
 * INPUT
 * Class database for sql connect and CRUD
 * Class sign for login in dashboard and insert session
 * function logout for bye to dashboard and delete session
 * 
 * OUTPUT
 * Page dashboard
 * Function insert update delete data
 * Insert data session and delete data session
 * 
 * Author  : Tria Bagus Nur Taufik
 * Version : Beta , 28 March 2019
 */
class database{
 
	protected $host = "localhost";
	protected $uname = "toor";
	protected $pass = "1";
	protected $db = "kompetensi";
    public $conn;

    function __construct(){
        $this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db)or die(mysqli_error());
        
    }

    function tampil_data_mahasiswa(){
        $data = mysqli_query($this->conn, "SELECT * FROM mahasiswa");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_data_sks_mahasiswa($id){
        $data = mysqli_query($this->conn, "SELECT * FROM ambil_sks JOIN mata_kuliah ON ambil_sks.id_matakuliah = mata_kuliah.id WHERE id_mahasiswa='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_data_matakuliah(){
        $data = mysqli_query($this->conn, "SELECT * FROM mata_kuliah");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_mahasiswa($id){
       
        $data = mysqli_query($this->conn, "SELECT * FROM mahasiswa  WHERE nim='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_data_nilai_mahasiswa($id){

        $data = mysqli_query($this->conn, "SELECT * FROM penilaian JOIN mata_kuliah ON penilaian.id_matakuliah = mata_kuliah.id  WHERE id_mahasiswa='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_jumlah_sks($id){
        $data = mysqli_query($this->conn, "SELECT SUM(jumlah_sks) AS total FROM penilaian JOIN mata_kuliah ON penilaian.id_matakuliah = mata_kuliah.id  WHERE id_mahasiswa='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_nilai_komulatif($id){
        $data = mysqli_query($this->conn, "SELECT SUM(nilai * jumlah_sks) AS total FROM penilaian JOIN mata_kuliah ON penilaian.id_matakuliah = mata_kuliah.id  WHERE id_mahasiswa='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_nilai_ipk($id){
        $data = mysqli_query($this->conn, "SELECT (SUM(nilai * jumlah_sks)) / SUM(jumlah_sks) AS total FROM penilaian JOIN mata_kuliah ON penilaian.id_matakuliah = mata_kuliah.id  WHERE id_mahasiswa='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function search($pencarian){

        $data_cari = mysqli_query($this->conn, "SELECT * FROM admin WHERE id LIKE '%$pencarian%' OR username LIKE '%$pencarian%' ");
        $adaTidakData=mysqli_num_rows($data_cari);
        if($adaTidakData !=0):
            while($ds = mysqli_fetch_array($data_cari)){
                $hasils[] = $ds;
            }
            return $hasils;
        else:
            echo "<tr><td colspan='6' style='text-align:center;' >Data tidak ditemukan</td></tr>";
        endif;
    }

    function insert($username,$pass,$akses,$gambar){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO admin(username,pass,akses_id,suka,gambar) VALUES ('$username','$pass','$akses',0,'$gambar')");
         
        return $resInsert;
                   
    }

    function insertmahasiswa($nim,$name){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO mahasiswa(nim,nama) VALUES ('$nim','$name')");
         
        return $resInsert;
                   
    }

    function addsksmahasiswa($nim,$matakuliah){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO ambil_sks(id_mahasiswa,id_matakuliah) VALUES ('$nim','$matakuliah')");
         
        return $resInsert;
                   
    }
    
    function nilaisksmahasiswa($nim,$matakuliah,$nilai){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO penilaian(id_mahasiswa,id_matakuliah,nilai) VALUES ('$nim','$matakuliah','$nilai')");
         
        return $resInsert;
                   
    }

    function editmahasiswa($name,$nim){
       
        $resUpdate = mysqli_query($this->conn, "UPDATE mahasiswa SET nim='$nim', nama='$name' WHERE nim='$nim'");
        return $resUpdate;
    }

    function editmatakuliah($id,$name,$sks){
       
        $resUpdate = mysqli_query($this->conn, "UPDATE mata_kuliah SET nama_matakuliah='$name', jumlah_sks='$sks' WHERE id='$id'");
        return $resUpdate;
    }

    function hapusmahasiswa($nim){
        $resDelete = mysqli_query($this->conn, "DELETE FROM mahasiswa WHERE nim='$nim'");
        return $resDelete;
    }
    
    function hapusmatakuliah($id){
        $resDelete = mysqli_query($this->conn, "DELETE FROM mata_kuliah WHERE id='$id'");
        return $resDelete;
    }

    function insertsks($name,$sks){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO mata_kuliah(nama_matakuliah,jumlah_sks) VALUES ('$name','$sks')");
         
        return $resInsert;
                   
    }

 

} 

class sign extends database{

    // proses registrasi
    public function reg_user($username,$pass){
        $sql="SELECT * FROM admin WHERE username='$username'"; // OR email='$email'
        $cekUser = mysqli_query($this->conn,$sql);
        $countUser  = $cekUser->num_rows;

        if($countUser == 0){
            $sqlReg="INSERT INTO admin(username,pass,akses_id,suka,gambar) VALUES ('$username','$pass',2,0,'')";
            $resSqlReg=mysqli_query($this->conn,$sqlReg);

            return $resSqlReg;
        }else{
            return false;
        }
    }

    // proses login
    public function loginCek_user($username,$password){
        $sqlCekLogin="SELECT id,username FROM admin WHERE username='$username' AND password='$password'";
        // cek login
        $resultLogin = mysqli_query($this->conn,$sqlCekLogin);
        $userData    = mysqli_fetch_array($resultLogin);
        $countRow    = $resultLogin->num_rows;

        if($countRow == 1){
            // membuat SESSION
            $_SESSION['login']     = true;
            $_SESSION['id']        = $userData['id'];
            $_SESSION['username']  = $userData['username'];
            return true;
        }else{
            return false;
        }
    }

    // start SESSION
    public function get_session(){
        return $_SESSION['login'];
    }

    // start Logout
    public function user_logout(){
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
}

