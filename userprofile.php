<?php ob_start();?>
<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>


<div class="contentsection contemplete clear">
<div class="maincontent clear">

   
<div class="samepost clear">
    <?php
    if(!isset($_GET['name']) || $_GET['name']==NULL){
        header("Location:404.php");
    }
    else{
        $name=  mysqli_real_escape_string($db->link,$_GET['name']);
    }
        $sql="SELECT * FROM tbl_user WHERE fullname='$name'";
        $value=$db->select($sql);
        if($value){
            while($result=$value->fetch_assoc()){
         ?>
    
        <h1>Name : <?php echo $result['fullname'] ;?></h1>
         <img width="200" height="250" src="admin/<?php echo $result['image'] ;?>" alt="" />
        <?php } ?>
        <?php } else {echo "No Data Found";}?>
</div>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
	