<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
 ?>
 
 <div class="single">
         <div class="wrap">
     	    <div class="rsidebar span_1_of_left">
		</div>
    <?php 
    $id=$_GET["id"];
    $sql="SELECT * FROM product,category Where product.categoryid=category.categoryid and productid={$id} ";
    $rs= pg_query($dbconn,$sql);
    while ($row=pg_fetch_assoc($rs)) {
     ?>
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				     <ul id="etalage">
							<li>
								<div  class="img-magnifier-container">
								<img  id="myimage" class="etalage_thumb_image" src="img/<?php echo $row['productimg']?>" />	
								</div>
							</li>
						</ul>
			<!-- end product_slider -->
			</div>
			<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 3);
</script>

			<div class="cont1 span_2_of_a1">
				<h3 class="m_3"><?php echo $row['productname']?></h3>
				<div class="price_single">
							  <span class="actual"><?php echo $row['productprice']."$"?></span>
							</div>
              <form method="POST" action="cart.php"> 
            <label"><h4>Please choose quantity:</h4></label>
            <input type="number" name="sl" value="1" style="weight: 30px;" > <br>
          	<input type="hidden" name="id" value="<?=$id?>"> <br>
				<div class="btn_form">
					 <input type="submit" name="button-buy" value="Add to cart">
				  </form>
				</div>
    			<p class="m_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
			<div class="clear"></div>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
	 <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text"><?php echo $row["productdes"]; ?></p>
     </div>					
	 <div class="toogle">
     	<h3 class="m_3">Product Reviews</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
     <?php
    	}
    	?>
     <div class="clear"></div>
	 </div>
     </div>
     <?php 
     include("inc/footer.php")
      ?>