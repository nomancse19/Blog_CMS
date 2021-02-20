<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$role=session::get('role');

?>
        <div class="grid_10">
            <div class="box round first grid">
                <?php if($role=='0') {
                    ?>
                 <h2>Add New H_Category</h2>
               <div class="block copyblock"> 
                   
                     <?php
                   if($_SERVER["REQUEST_METHOD"]=='POST'){
                       $name=$fm->valid($_POST['name']);
                       $creator=session::get('username');
                       $name=  mysqli_real_escape_string($db->link,$name);
                       if($name==''){
                           $msg="Field Must Be Not Be Empty";
                       }
                       else{
                           $sql="INSERT into h_catagory(name,creator) VALUES('$name','$creator')";
                          $catinsert= $db->insert($sql);
                          if($catinsert){
                              $msg1="Catagory Inserted Succesfully";
                              //
                          }
                       }
                   }
                   
                   
                   ?>
                   <form action="H_catlist.php" method="post">
                    <table class="form">
                        <p style="color:red;"><?php if(isset($msg)){ echo $msg;}?></p>
                             <p style="color:green;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter H_Category Name..." class="medium" />
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
                 
                <h2>H_Category List</h2>
                <div class="block">        
                <table class="data display datatable" id="example">
                        <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>H_Category Name</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                    <tbody>
                            <?php
                        $sql="SELECT * FROM h_catagory order by id desc";
                       $catagory=$db->select($sql);
                       if($catagory){
                           $count=0;
                           while($result=$catagory->fetch_assoc()){
                               $count++;
                        ?>
                            <tr class="odd gradeX">
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $result['name'];?></td>
                                    <td><a href="edithcat.php?hcatid=<?php echo $result['id'];?>">Edit</a> 
                                     <?php if($role=='0'){
                                         ?>
                                     || <a onclick="return confirm('Are You Sure Delete?');" href="delhcat.php?hcatid=<?php echo $result['id'];?>">Delete</a></td>
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
  