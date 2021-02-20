<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
        <table class="data display datatable" id="example">
                            <thead>
                            <tr>
                                    
                                    <th width="5%">SL</th>
                                    <th width="15%">Post Title</th>
                                    <th width="20%">Description</th>
                                    <th width="10%">Category</th>
                                    <th width="15%">Author</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeA">
                                <?php
                                $sql="SELECT * FROM tbl_post";
                                $value=$db->select($sql);
                                if($value){
                                    $i=0;
                                    while($result=$value->fetch_assoc()){
                                        $i++;
                                
                                ?>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $result['title'];?></td>
                                    <td><?php echo $fm->textshorten2($result['body'],40);?></td>
                                    <td>
                                         <?php
                                       $power=$result['cat'];
                                       $query="SELECT * FROM tbl_catagory WHERE id='$power'";
                                       $data=$db->select($query);
                                       while($permit=$data->fetch_assoc()){
                                            echo $permit['name'];  
                                       }
                                    
                                       ?>
                                        
                                        
                                    </td>
                                    <td><?php echo $result['author'];?></td>
                                    <td class="center"><?php echo $result['image'];?></td>
                                    <td><a href="">Edit</a> || <a href="">Delete</a></td>
                            </tr>
                                <?php } ?>
                                <?php } else { echo "Sorry No Data Found";} ?>
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