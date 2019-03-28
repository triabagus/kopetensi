<?php
    include 'function.php';
    $db = new database();
    
    $aksi=$_GET['aksi'];

        if($aksi=="tambahmahasiswa"){
            $db->insertmahasiswa($_POST["nim"],$_POST["name"]);
            header("location:data-mahasiswa.php");    
        }elseif($aksi=="tambahsks"){
            $db->insertsks($_POST["name"],$_POST["sks"]);
            header("location:dashboard.php");    
        }elseif($aksi=="editmahasiswa"){
            $db->editmahasiswa($_POST["name"],$_POST["nim"]);
            header("location:data-mahasiswa.php");    
        }elseif($aksi=="hapusmahasiswa"){
            $db->hapusmahasiswa($_GET['nim']);
            header("location:data-mahasiswa.php"); 
        }elseif($aksi=="addsksmahasiswa"){
            $db->addsksmahasiswa($_POST["nim"],$_POST["matakuliah"]);
            header("location:data-mahasiswa.php"); 
        }elseif($aksi=="nilaimahasiswa"){
            $db->nilaisksmahasiswa($_POST["nim"],$_POST["matakuliah"],$_POST["nilai"]);
            header("location:data-mahasiswa.php");         
        }elseif($aksi=="editmatakuliah"){
            $db->editmatakuliah($_POST["id"],$_POST["name"],$_POST["sks"]);
            header("location:data-matakuliah.php");         
        }elseif($aksi=="hapusmatakuliah"){
            $db->hapusmatakuliah($_GET['id']);
            header("location:data-matakuliah.php"); 
        }

?>