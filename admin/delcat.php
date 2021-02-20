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
                       $catid=  mysqli_real_escape_string($db->link,$_GET['catid']);
                        $sql="DELETE FROM tbl_catagory WHERE id='$catid'";
                        $value=$db->cat_delete($sql);
                   ?>