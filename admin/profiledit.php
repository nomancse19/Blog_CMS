
<?php 
ob_start();
include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Profile  Edited Or Updated</h2>
               <div class="block copyblock"> 
                   <?php
                   if(!isset($_GET['myid']) || $_GET['myid']==NULL){
                       header("Location:myprofile.php");
                   }
                   else {
                       $myid=  mysqli_real_escape_string($db->link,$_GET['myid']);
                   }
                   
                   
                   if($_SERVER["REQUEST_METHOD"]=='POST'){
                       $username=$fm->valid($_POST['username']);
                       $fullname=$fm->valid($_POST['fullname']);
                       $details=$fm->valid($_POST['details']);
                      
                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                $uploaded_image = "upload/".$unique_image;
                       if($username=='' || $fullname=="" || $details==""){
                           $msg="Field Must Be Not Be Empty";
                       }
                       else {
                                    if(!empty($file_name)){

                                    if ($file_size >1048567) {
                                     echo "<span class='error'>Image Size should be less then 1MB!
                                     </span>";
                                    } elseif (in_array($file_ext, $permited) === false) {
                                     echo "<span class='error'>You can upload only:-"
                                     .implode(', ', $permited)."</span>";
                                    }

                                    else{
                                        
                                         move_uploaded_file($file_temp, $uploaded_image);
                                        $sql="UPDATE tbl_user SET username='$username',fullname='$fullname',image='$uploaded_image',details='$details' WHERE id='$myid'";
                                       $userupdate= $db->update($sql);
                                       if($userupdate){
                                           $msg1="Your Profile Updated Succesfully";
                                           header("Location:myprofile.php?msg=".urlencode($msg1));
                                           //
                                       }
                                    }
                                    }
                                   else {
                                        
                                         $sql="UPDATE tbl_user SET username='$username',fullname='$fullname',details='$details' WHERE id='$myid'";
                                       $userupdate= $db->update($sql);
                                       if($userupdate){
                                           $msg1="Your Profile Updated Succesfully";
                                           header("Location:myprofile.php?msg=".urlencode($msg1));
                                           //
                                       }
                                    }
                                
                       }
                   
                   }
                   ?>
                   
                   <form action="profiledit.php?myid=<?php echo $myid;?>" method="post" enctype="multipart/form-data">
                    <table class="form">
                        
                        <p style="color:red;"><?php if(isset($msg)){ echo $msg;}?></p>
                             <p style="color:green;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                             <?php
                             $sql="SELECt * FROM tbl_user WHERE id='$myid'";
                                $value=$db->select($sql);
                             if($value){
                             while($result=$value->fetch_assoc()){
                                 
                             ?>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                             <td>Full name</td>
                            <td>
                                <input type="text" name="fullname" value="<?php echo $result['fullname'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                             <td>User Details</td>
                            <td>
                                <input type="text" name="details" value="<?php echo $result['details'];?>" class="medium" />
                            </td>
                        </tr>
                        
                         
                        <tr>
                            <td><img width="100" height="50" src="<?php echo $result['image'];?>" alt="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Your Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                         
                         
                        
			<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                             <?php } ?>
                        <?php } else { echo "Sorry No Data Found ! Please Contact Super Admin" ;}?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?>  