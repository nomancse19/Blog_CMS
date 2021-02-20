<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php session::sessiontime();?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                    Welcome admin panel <br>
                    Currently Login As <?php echo session::get('fullname');?><br> 

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>     