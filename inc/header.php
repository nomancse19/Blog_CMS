<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php
$db=new Database();
$fm=new format();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
        <?php
        if(isset($_GET['id'])){
            $postid=  mysqli_real_escape_string($db->link,$_GET['id']);
            $sql="SELECT * FROM tbl_post WHERE id='$postid'";
            $value=$db->select($sql);
            if($value){
            while($result=$value->fetch_assoc()) { 
             ?>
    <title><?php echo ucwords($result['title']) ;?>--<?php echo TITILE;?></title>
        <?php } } ?>
        <?php } 
         elseif(isset($_GET['catagory'])){
            $catid=$_GET['catagory'];
            $sql="SELECT * FROM tbl_catagory WHERE id='$catid'";
            $value=$db->select($sql);
            if($value){
            while($result=$value->fetch_assoc()) { 
             ?>
           <title><?php echo ucwords($result['name']) ;?>--<?php echo TITILE;?></title>
        <?php } } ?>
        <?php } 
        
        else { ?>
           <title><?php echo $fm->title();?>--<?php echo TITILE;?></title>
        <?php  } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a Website About Technology Blog">
       <meta charset="UTF-8">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Jahidul Islam Noman">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css1/side.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Micnotech-The Tech Zone</h2>
				<p></p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
                <?php
                  $path=$_SERVER['SCRIPT_FILENAME'];
                    $current=  basename($path,".php");
                ?>
                <li><a <?php if($current=='index') {echo "id=active";} ?> href="index.php">Home</a></li>        
                        <li><a <?php if($current=='programming') {echo "id=active";} ?> href="programming.php">Programming</a>						

                        <ul>
                              <?php
                                        $sql="SELECT * from tbl_catagory limit 4";
                                      $post=$db->select($sql);
                                      if(isset($post)){
                                        while($result=$post->fetch_assoc()){
                                         ?>
                                            <li><a <?php
                                     if(isset($_GET['catagory'])&& $_GET['catagory']==$result['id']){
                                         echo 'id="active"';
                                     }
                                     ?>
                                                    
                                                    href="posts.php?catagory=<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></a></li>						

                                <?php } ?>
                            <?php } else { header("Location:404.php"); }?>
                        </ul>
                   </li>
		
		 <li><a <?php if($current=='hacking') {echo "id=active";} ?> href="hacking.php">Hacking</a>
                        <ul>
                            <li><a href="">About</a>
                                            </li>
                             <?php
                                $sql="SELECT * from h_catagory";
                               $post=$db->select($sql);
                              if(isset($post)){
                                while($result=$post->fetch_assoc()){
                                 ?>
                                    
                                 <li><a 
                                         <?php
                                     if(isset($_GET['h_catagory'])&& $_GET['h_catagory']==$result['id']){
                                         echo 'id="active"';
                                     }
                                     ?>
                                         href="catdetails.php?h_catagory=<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></a></li>
                                 <?php } ?>
                                <?php } ?>
                        </ul>
                 </li>
		
		<li><a <?php if($current=='about') {echo "id=active";} ?> href="about.php">About</a></li>	
		<li><a <?php if($current=='contact') {echo "id=active";} ?> href="contact.php">Contact</a></li>
	</ul>
</div>
