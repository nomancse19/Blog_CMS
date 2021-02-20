<?php include '../lib/session.php';
session::intit();
        if(session::get("login")==TRUE){
             header("Location:home.php");
        }
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>
<?php
$db=new Database();
$fm=new format();

    $userid=$_GET['id'];
?>

            <?php
                $sql="SELECT * FROM tbl_user WHERE id='$userid'";
                $value=$db->select($sql);
                if($value!=FALSE){
                    $result= $value->fetch_assoc();
                    $row=  mysqli_num_rows($value);
                    if($row>0){
                        session::set("login", true);
                        session::set("username", $result['username']);
                        session::set("userid", $result['id']);
                        session::set("role", $result['role']);
                        session::set("image", $result['image']);
                        session::set("visible", $result['visible']);
                        session::set("active",time());
                        session::set("fullname", $result['fullname']);
                        header("Location:home.php");
                    }
                   
                }
            ?>
        
       