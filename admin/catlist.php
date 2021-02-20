<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$role=session::get('role');

?>
<style type="text/css">
	#pop_background{
	width:100%;
	height:900px;
	top:0;
	left:0;
	background:#000;
	opacity:.8;
	z-index:1500;
	position:fixed;
	cursor:pointer;
		display:none;
	}
		#pop_box{
		position:absolute;
		background:#fff;
		width:40%;
		padding:100px;
		z-index:1500;
		margin:100px 0 0 35%;
		display:none;
}
</style>

        <div class="grid_10">
            <div class="box round first grid">
                <?php 
                if($role=='0')
                    {
                    
                 ?>
                 <h2>Add New Category</h2>
               <div class="block copyblock"> 
                   <?php
                   if($_SERVER["REQUEST_METHOD"]=='POST'){
                       $name=$fm->valid($_POST['name']);
                       $name=  mysqli_real_escape_string($db->link,$name);
                       $creator= session::get('username');
                       if($name==''){
                           $msg="Field Must Be Not Be Empty";
                       }
                       else{
                           $sql="INSERT into tbl_catagory(name,creator) VALUES('$name','$creator')";
                          $catinsert= $db->insert($sql);
                          if($catinsert){
                              $msg1="Catagory Inserted Succesfully";
                              //
                          }
                       }
                   }
                   
                   
                   ?>
                   
                   <form action="catlist.php" method="post">
                    <table class="form">

                            <p style="color:red;"><?php if(isset($msg)){ echo $msg;}?></p>
                             <p style="color:green;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
			<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>
                    </table>
                    </form>
                   
               </div>
                  <?php } ?>
                <h2>Category List</h2>
                <div class="block">        
               <table class="data display datatable" id="example">
                        <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php
                        $sql="SELECT * FROM tbl_catagory order by id desc";
                       $catagory=$db->select($sql);
                       if($catagory){
                           $count=0;
                           while($result=$catagory->fetch_assoc()){
                               $count++;
                        ?>
                            <tr class="odd gradeX">
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $result['name'];?></td>
                                    <td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a>
                             <?php if($role=='0') 
                                 {  
                                 ?>
                            || <a onclick="return confirm('Are You Sure Delete?');" href="delcat.php?catid=<?php echo $result['id'];?>">Delete</a></td>
                             <?php } ?> 
                                    
                            </tr>
                           <?php } ?>
                           <?php } else { echo "No Data Found" ;}?>  
                    </tbody>
                </table>
               </div>
            </div>
        </div>
   <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
                setSidebarHeight();
        });
    </script>
    <?php include 'inc/footer.php';?>  
  