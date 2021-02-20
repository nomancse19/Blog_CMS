<?php ob_start();?>
<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>


<div class="contentsection contemplete clear">
<div class="maincontent clear">
  <!--Pagination Start -->
  <?php
  $per_page=3;
  if(isset($_GET['page'])){
      $page=$_GET['page'];
  }else{
      $page=1;
  }
  $start_from=($page-1)*$per_page;
  
  
  ?>
  
  <!--Pagination Finish -->
    <?php
    $sql="SELECT * from tbl_post order by id desc limit $start_from,$per_page";
    $post=$db->select($sql);
    if($post){
        $count=0;
        while($result=$post->fetch_assoc()){  
            $count=$count+$result['id'];
    ?>
        <div class="samepost clear">
            <h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo ucwords($result['title']);?></a></h2>
            <h4><?php echo $fm->formatdate($result['date']);  ?>, By <a href="userprofile.php?name=<?php echo $result['author'];?>"><?php echo $result['author'];?></a></h4>
                 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
                        <?php echo $fm->textshorten($result['body']);?>
                <div class="readmore clear">
                        <a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
                </div>
        </div>
        <?php }?><!--End Of While Loop -->
        <?php echo $count;?>
   <!--Pagination Start -->
   <?php  
   $sql="SELECT * from tbl_post";
   $result=$db->select($sql);
   $total_rows=  mysqli_num_rows($result);
   $total_page=ceil($total_rows/$per_page);
   echo "<span class='pagination'><a href='index.php?page=1'>First Page</a>";
   for($i=1;$i<=$total_page;$i++){
       
            
       
       echo "<a  href='index.php?page=$i'>$i</a>";
      
   }
 
   echo "<a href='index.php?page=$total_page'>Last Page</a>"."</span>";?>
   <!--Pagination Finished -->
    <?php } else { header("Location:404.php");} ?>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
	