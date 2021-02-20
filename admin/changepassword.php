<?php ob_start();?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$userid=session::get('userid');

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password..</h2>
                <?php
                $query="SELECT * FROM tbl_user WHERE id='$userid'";
                $value=$db->select($query)->fetch_assoc();
                $oldpass=$value['password'];
                ?>
              <?php
            if($_SERVER["REQUEST_METHOD"]=='POST'){
                $oldpassword=$fm->valid($_POST['oldpassword']);       
                $newpassword=$fm->valid($_POST['newpassword']);       
                $newpassword=  mysqli_real_escape_string($db->link,$newpassword);
                $oldpassword=  mysqli_real_escape_string($db->link,$oldpassword);
                $oldpassword=  md5($oldpassword);
                $newpassword=  md5($newpassword);
                if($oldpassword=="" || $newpassword==""){
                    $msg="Field Must Be Not Be Empty";
                }
                else {
                    if($oldpassword==$oldpass){
                        $sql="UPDATE tbl_user SET password='$newpassword' WHERE id='$userid'";
                        $update=$db->update($sql);
                        if($update!=FALSE){
                          $msg1="Your Password Change Succesfully";
                        } 
                    }
                    else {
                        $msg="Your Old Password Is Wrong";
                    }
                    
               
                 
                }
            }
            
            ?>
        
                <div class="block sloginblock">               
                    <form action="changepassword.php" method="post">
                    <table class="form">
                        <p style="color:red;font-weight: bold;"><?php if(isset($msg)){ echo $msg;}?></p>
                        <p style="color:green;font-weight: bold;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                        <tr>
                            <td>
                                <label>Your Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Your Old Password..."  name="" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Enter Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="oldpassword" required="" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Enter New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..."  name="newpassword" required="" class="medium" />
                            </td>
                        </tr>
                  		 
						
			 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?>  