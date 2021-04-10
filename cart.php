<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$id =$_POST['id'];

	if (empty($_SESSION['cart'][$id])) {
		$q=pg_query($dbconn,"SELECT * FROM product WHERE productid = {$id}");
		$product = pg_fetch_assoc($q);
		$_SESSION['cart'][$id]=$product;
		$_SESSION['cart'][$id]['sl']=$_POST['sl'];
		header("Location: cart.php");
	}else{
		$sMoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl'];
		$_SESSION['cart'][$id]['sl']=$sMoi;
		header("Location: cart.php");
	}
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 <link rel="stylesheet" type="text/css" href="cart.css">
 	<h3 class="giohang"><i class="fas fa-shopping-cart"></i>  Cart</h3>
  <br>
  <br>
 	<?php 
 	if (!empty($_SESSION['cart'])) {
 		foreach ($_SESSION['cart'] as $item) :
 		?>
 		<div class="products" style="border: 2px solid black">
 	 	<a href="single.php?id=<?php echo $item['productid']?>" style="text-decoration: none;">
 	 	<div><img src="img/<?php echo $item['productimg']?>" class="img-cart"></div>
 	 	<h2><?php echo $item['productname'] ?></h2>
        <p style="color: red">Price: <?php echo $item['productprice']." $"; ?></p>
		<p style="float: right; padding: 30px;">Number: <?php echo $item['sl'] ?></p>
        <?php
		echo "<a href='delcart.php?productid=$item[productid]' style='text-decoration: none;'>Delete</a>";
		?>
         </a>
         </div>
         	 <?php
 	endforeach;
 	}
 	else 
 		echo "There are no products in the product";
 	?>
 	<br>
   <?php
 		 $tong = 0;
 		  foreach ($_SESSION['cart'] as $item ) :
 		 	$tong += $item['sl'] * $item['productprice'];
 		 endforeach;
 		 ?>
	 <?php
	 if ($tong !=0){
		?>
		<a href="delcart.php?productid=0" style="text-decoration: none; color: white"><button type="button" class="btn btn-danger">Delete All</button></a>
	 <div id="total" class="clearfix">
 		 <h3>Total: <?php echo number_format($tong) ." $" ?></h3>
 	</div>
		<div class="container" style="border-top:3px solid #38D276;margin-top: 20px">
 	<div class="col-md-6" style="border: 1px solid #38D276">
<h3 style="text-align: center;">Checkout Form</h3>
 	<form method="POST" action="thanhtoan.php" class="was-validated">
	 <h4>Billing Address</h4>
	 <div class="form-group" class="form-inline">
	 <label for="n"><i class="fa fa-user"></i>Enter FullName</label>
	 <input type="text" class="form-control" id="n" placeholder="Enter FullName" name="name" required>
	 <label for="phone">Enter Phone</label>
	 <input type="phone" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required>
	 <label for="add"><i class="fa fa-institution"></i>Enter Address</label>
	 <input type="text" class="form-control" require id="add" placeholder="Enter Phone" name="add" required>
	 <label for="email"> <i class="fa fa-envelope"></i>Email</label>
	 <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
	 <label for="note"> <i class="fa fa-envelope"></i>Message for shop</label>
	 <input type="text" class="form-control" id="note" placeholder="Enter Message" name="note">
	 </div>
	 <h4>Payment</h4>
    <label for="bank">Select payment bank</label> <br>
	<label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
  <select class="custom-select" required id="bank" name="bank">
    <option selected></option>
    <option value="Visa">Visa</option>
    <option value="Techcombank">MasterCard</option>
    <option value="Airpay">Discovery</option>
    <option value="momo">Viettelpay</option>
  </select>
<div class="form-group">
  <div class="form-group">
  <label for="usr">Order date:</label>
  <input type="text" class="form-control" id="usr" name="date" value="<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "". date("Y.m.d h:i:sa");
?>" readonly>
</div>
<div class="form-group">
  <label for="usr">Total</label>
  <input type="text" class="form-control" id="usr" value=" <?php echo number_format($tong) ." $" ?>" readonly name="total">
</div>
<label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label> <br>
<input type="submit" class="btn btn-success" value="Checkout">
<input type="hidden" name="id" value="<?=$item?>">
 	</form>
 	</div>
		<?php
		}
		?>
 </div>
 </div>
 </div>
 <?php 
 include ('inc/footer.php');
  ?>
  
