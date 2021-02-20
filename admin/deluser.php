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
                $delid=  mysqli_real_escape_string($db->link,$_GET['delid']);
            $sql="DELETE FROM tbl_user WHERE id='$delid'";
            $value=$db->delete($sql);
            if($value==TRUE){
                $del="User Deleted Succcess";
                header("Location:userlist.php?del=".  urlencode("$del"));
            }
            ?>