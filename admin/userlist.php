<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$role=session::get('role');
 if(!$role==0){
     header("Location:home.php");
 }
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
                <h2>User List</h2>
              <p style="color:green;font-weight: bold;"><?php if(isset($_GET['del'])) echo $_GET['del'] ;?></p>
                <div class="block">        
               <table class="data display datatable" id="example">
                        <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Username</th>
                                    <th width="20%">Full Name</th>
                                    <th width="10%">Role</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Become User</th>
                                    <th width="14%">Action</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php 
                        $sql="SELECT * FROM tbl_user";
                        $value=$db->select($sql);
                        if($value){
                            $count=0;
                            while($result=$value->fetch_assoc())
                            {
                                $count++;
                        ?>
                        
                            <tr class="odd gradeX">
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $result['username'];?></td>
                                    <td><?php echo $result['fullname'];?></td>
                                    <td>
                                       <?php
                                       $power=$result['role'];
                                       $query="SELECT * FROM user_role WHERE role='$power'";
                                       $data=$db->select($query);
                                       while($permit=$data->fetch_assoc()){
                                            echo $permit['name'];  
                                       }
                                    
                                       ?>
                                    </td>
                                    <td><img width="100" height="30" src="<?php echo $result['image'];?>" alt="" /></td>
                                    <td>
                                       <?php
                                       if($result['visible']==20){
                                           echo "<span style='color:red;font-size:16px;font-wight:bold;'>Deactivated</span>";
                                       }
                                       else {
                                           echo "<span style='color:green;font-size:16px;font-wight:bold;'>Activated</span>";
                                       }
                                       ?>
                                    
                                    </td>
                                    <td><a href="becomeuser.php?id=<?php echo $result['id'];?>">Login User</a></td>
                                    <td><a href="edituserlist?userid=<?php echo $result['id'];?>">Edit</a> || <a href="userview.php?viewid=<?php echo $result['id'];?>">View</a> || <a href="deluser.php?delid=<?php echo $result['id'];?>">Delete</a></td>
                           
                            </tr> 
                            <?php } ?>
                        <?php } ?>
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
  