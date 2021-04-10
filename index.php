<?php
require("inc/conn.php");
include('inc/header.php');
?>
<div class="index-banner">
       	  <div class="wmuSlider example1" style="height: 560px;">
			  <div class="wmuSliderWrapper">
				  <article style="position: relative; width: 100%; opacity: 1;"> 
				   	<div class="banner-wrap">
					   	<div class="slider-left">
							<img src="img/hompage.jpg" style="width: 100%;"> 
						</div>
						 <div class="clear"></div>
					 </div>
					</article>
				   <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	 <div class="banner-wrap">
					   	<div class="slider-left">
							<img src="img/hompage2.jpg" alt=""/> 
						</div>
						 <div class="clear"></div>
					 </div>
				   </article>
				</div>
                <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
                <ul class="wmuSliderPagination">
                  </ul>
                 <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a><ul class="wmuSliderPagination"><li><a href="#" class="wmuActive">0</a></li><li><a href="#" class="">1</a></li><li><a href="#" class="">2</a></li><li><a href="#" class="">3</a></li><li><a href="#" class="">4</a></li></ul></div>
            	 <script src="js/jquery.wmuSlider.js"></script> 
				 <script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
						<script>
       						 $('.example1').wmuSlider();         
   						</script> 	           	      
             </div>
 <div class="container-fluid">
	<div class="row">
		<div style="border-bottom:4px solid #C63D5D;width: 100%">
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
				  <?php
include("inc/footer.php");
 ?>    