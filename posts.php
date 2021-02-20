
<?php 
include 'inc/header.php';?>
<?php
if(!isset($_GET['catagory']) || ($_GET['catagory'])==NULL ){
    header("Location:404.php"); 
}
  else 
      {
        $id=  mysqli_real_escape_string($db->link,$_GET['catagory']);
  }


?>

<div class="contentsection contemplete clear">
<div class="maincontent clear">
  <!--Pagination Start -->
  <?php
  $per_page=3;
 if(isset($_GET['page'])){  
     $page=$_GET['page']; 
     }
     else{
     $page=1;
 }
 $start_from=($page-1)*$per_page;
  
  
     ?>
  
  <!--Pagination Finish -->
    <?php
    $sql="SELECT * from tbl_post WHERE cat='$id' limit $start_from,$per_page";
    $post=$db->select($sql);
    if($post){
        while($result=$post->fetch_assoc()){  
    ?>
        <div class="samepost clear">
            <h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo ucwords($result['title']);?></a></h2>
                <h4><?php echo $fm->formatdate($result['date']);  ?>, By <a href="#"><?php echo $result['author'];?></a></h4>
                 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
                        <?php echo $fm->textshorten($result['body']);?>
                <div class="readmore clear">
                        <a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
                </div>
        </div>
        <?php } ?><!--End Of While Loop -->
          <!--Pagination Start -->
   <?php  
   $sql="SELECT * from tbl_post WHERE cat='$id'";
   $result=$db->select($sql);
   $total_rows=  mysqli_num_rows($result);
   $total_page=ceil($total_rows/$per_page);
   echo "<span class='pagination'><a href='posts.php?catagory=$id&page=1'>First Page</a>";
   for($i=1;$i<=$total_page;$i++){
       
           
         
       echo "<a 
          
       href='posts.php?catagory=$id&page=$i'>$i</a>";
      
   }
 
   echo "<a href='posts.php?catagory=$id&page=$total_page'>Last Page</a>"."</span>";?>
   <!--Pagination Finished -->
    <?php } else { header("Location:404.php");} ?>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
	