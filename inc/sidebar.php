

        <div class="sidebar clear">
        <div class="samesidebar clear">
            <h2>Categories</h2>    
                 <ul>
                      <li class="dropdown">
                          <a href="#" data-toggle="dropdown">Programming <i class="icon-arrow"></i></a>
                         <ul class="dropdown-menu">
                                <?php
                                $sql="SELECT * from tbl_catagory";
                               $post=$db->select($sql);
                              if(isset($post)){
                                while($result=$post->fetch_assoc()){
                                 ?>      
                             <li><a 
                                     <?php
                                     if(isset($_GET['catagory'])&& $_GET['catagory']==$result['id']){
                                         echo 'id="active"';
                                     }
                                     ?>
                                     href="posts.php?catagory=<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></a></li>
                                <?php } ?>
                            <?php } ?>
                         </ul>
                     </li>
                           <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Hacking <i class="icon-arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">About</a></li>
                                     <?php
                                $sql="SELECT * from h_catagory";
                               $post=$db->select($sql);
                              if(isset($post)){
                                while($result=$post->fetch_assoc()){
                                 ?>
                                    
                                 <li><a href="catdetails.php?h_catagory=<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></a></li>
                                 <?php } ?>
                                <?php } ?>
                                </ul>
                    </li>
               </ul>
           </div>

        <div class="samesidebar clear">
                <h2>Latest articles</h2>
                   <?php
                $sql="SELECT * from tbl_post order by id desc limit 5";
                $post=$db->select($sql);
                if($post){
                while($result=$post->fetch_assoc()){  
                 ?>
                      <div class="popular clear">
                                <h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo ucwords($result['title']);?></a></h3>
                                <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
                               <?php echo $fm->textshorten2($result['body'],110);?>
                       </div>
                  <?php } ?><!--End Of While Loop -->
                 <?php } else { header("Location:404.php");} ?>
        </div>

</div>