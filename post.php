<?php
include 'inc/header.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
        <div class="about">
            <?php
            if(!isset($_GET['id']) || ($_GET['id'])==NULL ){
             header("Location:404.php");
            }
            else
            {
             $id=$_GET['id'];
            $postid= mysqli_real_escape_string($db->link,$id);
            }
            $sql="SELECT * from tbl_post WHERE id='$postid'";
            $post=$db->select($sql);
            if($post){
              while($result=$post->fetch_assoc()){  
             ?>
            
                <h2><?php echo ucwords($result['title']);?></h2>
                <h4><?php echo $fm->formatdate($result['date']);  ?>, By <a href="#"><?php echo $result['author'];?></a></h4>
               <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
                  <?php echo $result['body'];?>
                <div class="relatedpost clear">
                        <h2>Related articles</h2>
                        <?php
                        $catid=$result['cat'];
                        $catrel="SELECT * from tbl_post WHERE cat='$catid' limit 6";
                         $rpost=$db->select($catrel);
                          if($rpost){
                            while($relpost=$rpost->fetch_assoc()){
                        ?>
                        <a href="post.php?id=<?php echo $relpost['id'];?>"><img src="admin/<?php echo $relpost['image'];?>" alt="post image"/></a>
                            <?php } ?>
                          <?php } ?>
                </div>
              <?php  } } else { header("Location:404.php"); } ?>
	</div>

		</div>
        <?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>