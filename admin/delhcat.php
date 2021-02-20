<?php 
ob_start();
?>
<?php include '../lib/session.php';?>
<?php session::checksession();?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>
<?php
$db=new Database();
$fm=new format();

?>

                   <?php
                       $hcatid=  mysqli_real_escape_string($db->link,$_GET['hcatid']);
                   $sql="DELETE FROM h_catagory WHERE id='$hcatid'";
                   $value=$db->h_delete($sql);
                   ?>