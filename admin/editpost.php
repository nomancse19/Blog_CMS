<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                  <?php
                   if($_SERVER["REQUEST_METHOD"]=='POST'){
                       $title=$fm->valid($_POST['title']);
                       $cat=$fm->valid($_POST['cat']);
                       $hcat=$fm->valid($_POST['hcat']);
                       $body=($_POST['body']);
                       
                       $author=session::get("fullname");
                       $creator= session::get('username');
                       
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;
                       if($cat=='' || $title==''|| $body==''|| $file_name==''|| $hcat==''){
                           $msg="Field Must Be Not Be Empty";
                       }
                       if (empty($file_name)) {
                        echo "<span class='error'>Please Select any Image !</span>";
                       }elseif ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                       } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                       }
                       
                       else 
                           {
                            move_uploaded_file($file_temp, $uploaded_image);
                           $sql="INSERT into tbl_post(cat,h_cat,title,body,image,author,creator) VALUES('$cat','$hcat','$title','$body','$uploaded_image','$author','$creator')";
                          $addpost= $db->insert($sql);
                          if($addpost){
                              $msg1="POST Inserted Succesfully";
                              //
                          }
                       }
                   }
                   
                   
                   ?>
                <h2>Edit/Update Post</h2>
                <div class="block">               
                    <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <p style="color:red;"><?php if(isset($msg)){ echo $msg;}?></p>
                        <p style="color:green;"><?php if(isset($msg1)){ echo $msg1;}?></p>
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Catagory</option>
                                    <?php
                                    $sql="SELECT * FROM tbl_catagory";
                                    $value=$db->select($sql);
                                    if($value){
                                    while($result=$value->fetch_assoc())
                                    {
                                    ?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php } ?>
                                    <?php } else { echo "No Data Found"; }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>H_Category</label>
                            </td>
                            <td>
                                <select id="select" name="hcat">
                                    <option>Select H_Catagory</option>
                                 <?php
                                    $sql="SELECT * FROM h_catagory";
                                    $value=$db->select($sql);
                                    if($value){
                                    while($result=$value->fetch_assoc())
                                    {
                                    ?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php } ?>
                                    <?php } else { echo "No Data Found"; }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
      <?php include 'inc/footer.php';?>
