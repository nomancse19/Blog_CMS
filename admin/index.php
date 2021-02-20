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


?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Administrator Panel Of Micnotech Site ....</title>
    <style type="text/css">
        body{
            margin:0px;
             padding:0px;   
        }
        .main{
            margin:20px auto;
            border:1px solid #CCCCCC;
            border-radius: 10px;
            width:1200px;
            min-height: 550px;
        } 
        
        .header{
            background: #002500 none repeat scroll 0 0;
            border-bottom: 9px solid #000091;
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            padding: 7px;
            
        }
        .part{
            width:600px;
            margin: 1px auto;
            border:1px solid #CCCCCC;
            border-radius: 10px;
            margin-top: 80px;
            min-height: 350px;
        }
        .part1{
            width:220px;
            float:left;
            margin-left: 7px;
            
        }
        .part1 p{
            font-size: 13px;
        }
        .part1 img{
             height: 115px;
             width: 160px;
        }
        .part1 a{
            font-size: 12px;
            text-decoration: none;
        }
        .part h2{
            color:#000091;
            margin-left: 8px;
        }
        .part2{
            float:right;
            width:320px;
            min-height: 200px;
            border:1px solid #CCCCCC;
            border-radius: 10px;
            margin-right: 20px;
            background: #F4F4F4;
        }
        .form{
            margin-top: 20px;
            margin-left:10px;
        }
        
        input[type="text"],input[type="password"]{
            padding:2px;
            margin-left:40px;;
            margin-bottom: 10px;
            width:162px;
        }
            input[type="submit"]{
            margin-left: 128px;
           background: #E2E2E2;
           width:80px;
           border-radius: 6px;
           cursor: pointer;
           padding:3px;
        }
        .footer{
            background: #343434 none repeat scroll 0 0;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            margin: 50px auto 1px;
            text-align: center;
            width: 311px;
        }
        .footer a{
            text-decoration: none;
            color:#fff;
        }
        .msg{
            color:red;
            font-weight: bold;
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="header">Administration</div>
            <?php
            if($_SERVER["REQUEST_METHOD"]=='POST'){
                $username=$fm->valid($_POST['username']);
                $password=$fm->valid($_POST['password']);
                $username=  mysqli_real_escape_string($db->link,$username);
                $password=  mysqli_real_escape_string($db->link,$password);
                $password=  md5($password);
                if($username=="" || $password==""){
                    $msg="Field Must Be Not Be Empty";
                }
                else {
                $sql="SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
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
                        header("Location:home");
                    }
                    else{
                        $msg2="No Data Found";
                    }
                 }
                 else
                     {
                     $msg1="Username Or Password Not Mached";
                 }
                }
            }
            
            ?>
        
        
        <div class="part">
            <h2>Micnotech! Administrator Login</h2>
            <div class="part1">
                <p>
                    Use A Valid Username And Password To Gain Access To The  Administrator Backend.
                </p>
                <a href="#">Go To Site Home page</a>
                <img src="locker.png" alt="" />
            </div>
            
            <div class="part2">
                <p class="msg"><?php if(isset($_GET['note'])) echo $_GET['note'] ;?></p>
                <p class="msg"><?php if(isset($_GET['returnmsg'])) echo $_GET['returnmsg'] ;?></p>
                <p class="msg"><?php if(isset($msg)){ echo $msg;}?></p>
                <p class="msg"><?php if(isset($msg1)){ echo $msg1;}?></p>
                <p class="msg"><?php if(isset($msg2)){ echo $msg2;}?></p>
                <form action="index.php" method="post">
                    <table class="form">
                        <tr>
                            <td> User Name</td>
                            <td><input type="text" name="username" required="" /></td>
                        </tr>
                        <tr>
                            <td> Password</td>
                            <td><input type="password" name="password" required="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login" value="Login" /></td>
                        </tr>
                    </table>
                    
                    
                </form>
                
            </div>
        </div>
        <div class="footer">
            All Right Reserved © <a href="https://www.facebook.com/jahidulislam.noman.5" target="_blank">Jahidul Islam Noman</a>
        </div>
    </div>
</body>
</html>