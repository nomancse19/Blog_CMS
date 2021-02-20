<?php ob_start(); ?>
<?php include 'inc/header.php';?>

<?php
if(!isset($_GET['search']) || ($_GET['search'])== NULL){
    header("Location:404.php");
}
 else {
       $search=  mysqli_real_escape_string($db->link,$_GET['search']);
    }


?>


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
    $sql="SELECT * from tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' limit $start_from,$per_page";
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
   $sql="SELECT * from tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
   $result=$db->select($sql);
   $total_rows=  mysqli_num_rows($result);
   $total_page=ceil($total_rows/$per_page);
   echo "<span class='pagination'><a href='search.php?search=$search&page=1'>First Page</a>";
   for($i=1;$i<=$total_page;$i++){
       echo "<a href='search.php?search=$search&page=$i'>$i</a>";
      
   }
 
   echo "<a href='search.php?search=$search&page=$total_page'>Last Page</a>"."</span>";?>
   <!--Pagination Finished -->
    <?php } else { echo "Your Search Query Not Match !!";} ?>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
	