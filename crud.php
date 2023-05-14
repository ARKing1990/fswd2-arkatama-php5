<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crud";

$db=mysqli_connect($db_host,$db_user,$db_pass,$db_name)or die(mysqli_connect_error($db));
if(isset($_POST ['bsimpan'])){
    if($_GET['hal']=="edit"){
       $edit=mysqli_query($db,"UPDATE user set
       nama='$_POST[bnama]',
       role='$_POST[brole]',
       email='$_POST[bemail]',
       password='$_POST[bpassword]',
       telepon='$_POST[btelepon]',
       alamat='$_POST[balamat]',
       images='$_POST[bimages]',
       WHERE id_user = '$_GET[id]'
       ");
       if($edit){
       echo "<script>
       alert('Edit data sukses');
       document.location='index.php';
       </script>";
       }
       else{
       echo "<script>
       alert('Edit data gagal');
       document.location='index.php';
       </script>";
       }
    }
    else{
       $simpan=mysqli_query($db,   "INSERT INTO user (nama,role,email,password,telepon,alamat,images)
                               VALUES ('$_POST[bnama]', 
                               '$_POST[brole]', 
                               '$_POST[bemail]', 
                               '$_POST[bpassword]',
                               '$_POST[btelepon]',
                               '$_POST[balamat]',
                               '$_POST[bimages]')
       ");
       if($simpan){
           echo "<script>
           alert('Simpan data sukses');
           document.location='index.php';
           </script>";
       }
       else{
           echo "<script>
           alert('Simpan data gagal');
           document.location='index.php';
           </script>";
       }
   }
}
if(isset($_GET['hal'])){
   if($_GET['hal']=="edit"){
       $tampil = mysqli_query($db,"SELECT * FROM user WHERE id_user = '$_GET[id]'");
       $data=mysqli_fetch_array($tampil);
       if($data){
           $nnama=$data['nama'];
           $nrole=$data['role'];
           $nemail=$data['email'];
           $npassword=$data['password'];
           $ntelepon=$data['telepon'];
           $nalamat=$data['alamat'];
       }
   }
   else if($_GET['hal']=="hapus"){
       $hapus=mysqli_query($db,"DELETE FROM user WHERE id_user='$_GET[id]'");
       if($hapus){
           echo "<script>
           alert('Hapus data sukses');
           document.location='index.php';
           </script>";
       }
   }
}
?>