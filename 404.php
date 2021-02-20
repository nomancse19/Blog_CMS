<?php include 'inc/header.php';?>
<style type="text/css">

.error_page{
  float: left;
  display: inline;
  text-align: center;
}
.error_page>h3{
  text-transform: uppercase;
  font-size: 35px;
}
.error_page > h1 {
  font-size: 110px; 
  padding: 45px;
  color:red;
}
.error_page > p {
  font-size: 15px;
  margin: 0 auto;
  width: 80%;
  margin-bottom: 40px;
}
.error_page > span {
  display: inline-block;
  height: 2px;
  text-align: center;
  width: 100px;
}
.error_page > a {
  color: #fff;
  display: inline-block;
  padding: 5px 10px;
  text-decoration: none;
}
.error_page > a:hover{
  opacity: 0.75;
}
  .error_page>h3{
  color: #d083cf;
}
.error_page > span {
  background: none repeat scroll 0 0 #d083cf;
}
.error_page > a {
  background-color: #d083cf;
}  
</style>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
                       <div class="error_page">
              <h3>We Are Sorry</h3>
              <h1>404</h1>
              <p>Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
              <span></span>
              <a href="index.php" class="wow fadeInLeftBig">Go to home page</a>
            </div> 
	        </div>
		</div>
	<?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>