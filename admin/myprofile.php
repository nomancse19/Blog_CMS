<?php ob_start();?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$userid=session::get('userid');

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Currently View <?php echo ucwords(session::get("fullname"));?> Profile--></h2>
          
        
                <div class="block sloginblock">               
                    <div class="self">
                          <p style="color:green;"><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></p>
                        <?php
                        $sql="SELECT * FROM tbl_user WHERE id='$userid'";
                        $value=$db->select($sql);
                        if($value){
                        while($result=$value->fetch_assoc()){
                        ?>
                        <h3><?php echo ucwords($result['fullname']); ?> ...Profile</h3>
                          <img class="pic" src="<?php echo $result['image']; ?>" alt="" />
                        <div class="self_part">
                            <br>
                            <table>
                                <tr>
                                    <td><span class="con_part1">User Name</span> </td>
                                    <td ><span class="con_part">:&nbsp;&nbsp;&nbsp;<?php echo ucwords($result['username']); ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="con_part1">Full Name</span>  </td>
                                    <td ><span class="con_part">:&nbsp;&nbsp;&nbsp;<?php echo ucwords($result['fullname']); ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="con_part1">User Type</span>  </td>
                                    <td ><span class="con_part">:&nbsp;&nbsp;
                                         <?php
                                       $power=$result['role'];
                                       $query="SELECT * FROM user_role WHERE role='$power'";
                                       $data=$db->select($query);
                                       while($permit=$data->fetch_assoc()){
                                            echo ucwords($permit['name']);  
                                       }
                                    
                                       ?>
                                            
                                         </span></td>
                                </tr>
                                <tr>
                                    <td><span class="con_part1">Your Details</span>  </td>
                                    <td ><span class="con_part">:&nbsp;&nbsp;&nbsp;<?php echo ucwords($result['details']); ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="con_part1">User Status</span>  </td>
                                    <td ><span class="con_part">:&nbsp;&nbsp;
                                          <?php
                                       if($result['visible']==20){
                                           echo "<span style='color:red;font-wight:bold;'>Deactivated</span>";
                                       }
                                       else {
                                           echo "<span style='color:green;font-wight:bold;'>Activated</span>";
                                       }
                                       ?>
                                        
                                        </span></td>
                                </tr>
                                <p>Do You Want To Edit Or Update Your Profile?
                                    <span class="up">Please Click</span> <a href="profiledit.php?myid=<?php echo $result['id'];?>">Edit/Update</a></p>
                            </table>
                        <?php } ?>
                        <?php } ?>
                        
                        </div>
                    </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?>  