<?php 
ob_start();
include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Category Update</h2>
               <div class="block copyblock"> 
                   <?php
                   if(!isset($_GET['hcatid']) || $_GET['hcatid']==NULL){
                       header("Location:H_catlist.php");
                   }
                   else {
                       $hcatid=  mysqli_real_escape_string($db->link,$_GET['hcatid']);
                   }
                   $sql="SELECt * FROM h_catagory WHERE id='$hcatid'";
                   $value=$db->select($sql);
                   
                   if($_SERVER["REQUEST_METHOD"]=='POST'){
                       $name=$fm->valid($_POST['name']);
                       $name=  mysqli_real_escape_string($db->link,$name);
                       $editor=session::get("username");
                       date_default_timezone_set("Asia/Dhaka");
                       $time=date('d-m-Y, h:i:s');
                       if($name==''){
                           $msg="Field Must Be Not Be Empty";
                       }
                       else{
                           $sql="UPDATE h_catagory SET name='$name',updated='$editor',updated_time='$time' WHERE id='$hcatid'";
                          $hcatupdate= $db->update($sql);
                          if($hcatupdate){
                              $msg1="H_Catagory Updated Succesfully";
                              //
                          }
                       }
                   }
                   
                   
                   ?>
                   
                   <form action="edithcat.php?hcatid=<?php echo $hcatid;?>" method="post">
                    <table class="form">
                        
                        <p style="color:red;"><?php if(isset($msg)){ echo $msg;}?></p>
                             <p style="color:green;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                             <?php
                             if($value){
                             while($result=$value->fetch_assoc()){
                                 
                             ?>
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
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