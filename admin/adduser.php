<?php ob_start();?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if(!session::get("role")==0){
    header("Location:index.php");
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add User..</h2>
              <?php
            if($_SERVER["REQUEST_METHOD"]=='POST'){
                $username=$fm->valid($_POST['username']);
                $password=$fm->valid($_POST['password']);
                $role=$fm->valid($_POST['urole']);
                $username=  mysqli_real_escape_string($db->link,$username);
                $password=  mysqli_real_escape_string($db->link,$password);
                $password=  md5($password);
                if($username=="" || $password==""){
                    $msg="Field Must Be Not Be Empty";
                }
                else {
                $sql="INSERT tbl_user(username,password,role) VALUES('$username','$password','$role')";
                $insert=$db->insert($sql);
                if($insert!=FALSE){
                  $msg="User Added Succesfully";
                 }
                }
            }
            ?>
                <div class="block sloginblock">               
                    <form action="adduser.php" method="post">
                    <table class="form">
                        <p class="msg"><?php if(isset($msg)){ echo $msg;}?></p>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter User Name..."  name="username" required="" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter User Password..."  name="password" required="" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                              <select id="select" name="urole">
                                    <option>Select Role</option>
                                   <?php
                                   $sql="SELECT * FROM user_role";
                                   $value=$db->select($sql);
                                   if($value){
                                   while($result=$value->fetch_assoc())
                                        {
                                   ?>
                                    <option value="<?php echo $result['role'];?>"><?php echo ucwords($result['name']);?></option>
                                   <?php } ?>
                                   <?php } ?>
                              </select>
                            </td>
                        </tr>			 			
			 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="add" Value="Add" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?>  