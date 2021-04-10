<?php 
require("inc/conn.php");
include('inc/header.php');
?>
<!-- slide -->
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  font-size: 17px;
}
.containers img {vertical-align: middle;}

.containers .content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
</style>
<!-- list product -->
<div class="container-fluid">
<div class="containers">
  <img src="img/hompage.jpg" alt="Notebook" style="width:100%;">
  <div class="content">
    <h1>Toy Store</h1>
    <p>Yeu Tre Joint Stock Company specializes in wholesale and retail business of toys, children's toys, baby toys, children's safe toys such as dolls, clay, remote control vehicles.</p>
  </div>
</div>
</div>
<br>
<br>
</div>
<div class="container-fluid">
	<div class="row">
		<div style="border-bottom:4px solid #C63D5D;width: 100%">
		<h2 >List Toys</h2>
		</div>
    <div style="width: 100%;color: red;text-align: center;">
    <marquee behavior="alternate" width="10%">>></marquee>Wish you find and buy the right product<marquee behavior="alternate" width="10%"><< </marquee>
    </div>
	<?php 
    $sql="SELECT * FROM product";
    $rs= pg_query($dbconn,$sql);
    if (pg_num_rows($rs)>0) 
    {
      while ($row=pg_fetch_assoc($rs)) 
      {
    ?>
				
        <div class="col-md-2.8" style="background-color: white;margin-top: 20px;margin-left: 35px;overflow: auto;width: 270px; 
					border: 2px solid #F7F7F7;border-radius: 1px;border-bottom: 6px solid #F7F7F7; float: left;">
			      	<a href="single.php?id=<?php echo $row['productid']?>" style=" text-decoration: none; 
			      text-align: center;">
				    <div class="view view-fifth">
				  	  <div class="top_box">
			      <div style="height:80px">
			        <h2><?php echo $row['productname'] ?></h2>
			        </div>
			        <div><img src="img/<?php echo $row['productimg']?>" style="width: 247px;height: 200px;padding: 7px"></div>
					<p style="color: red"><?php echo $row['productprice']." $"; ?></p>
					<div class="mask">
	                       		<div class="info">Quick View</div>
			                  </div>
			      </a>
					</div>
					</div>
    			</div>
    				 	<?php
      }
  }
    ?>
		</div>
		</div>
    <div class="clear"></div>			
				   </div>
				   <br>
				   <br>
				   <br>
<!-- end list product -->
<?php 
include("inc/footer.php");
 ?>