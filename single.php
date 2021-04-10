<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
 ?>
 <div class="container">
 <div class="row">
    <?php 
    $id=$_GET["id"];
    $sql="SELECT * FROM product,category Where product.categoryid=category.categoryid and productid={$id} ";
    $rs= pg_query($dbconn,$sql);
    while ($row=pg_fetch_assoc($rs)) {
     ?>
      <div class="col-md-6" style=" text-align: left;">
        <h1 class="name-pro">Name Of Toy: <?php echo $row['productname'] ?></h1>
        <h3 style="color: red;padding-left: 20px;"> Price: <?php echo $row['productprice']." $"; ?></h3>
          <br>
          <form method="POST" action="cart.php" style="text-align: center;"> 
            <label"><h4>Please choose quantity:</h4></label>
            <input type="number" name="sl" value="1" style="weight: 30px;" > <br>
          	<input type="hidden" name="id" value="<?=$id?>"> <br>
          	<button type="submit" name="button-buy" class="button-buy"><i class="fas fa-cart-plus"></i>  Add to cart</button>
          </form>
        <br>
        <br>
        <br>
        <h2>Video</h2>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/cMsCS-UvC4o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
          <style>
            .zoom {
  padding: 50px;
  background-color: white;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.8); }
          </style>
          <img src="img/<?php echo $row['productimg']?>" class="zoom" style="width: 400px;height: 300px" >
          <h2>
            <br>
          Basic toy info:
        </h2>
        <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Name</td>
        <td><?php echo $row['productname'] ?></td>
      </tr>
      <tr>
        <td>Genre</td>
        <td><?php echo $row["categoryname"]; ?></td>
      </tr>
      <tr>
        <td>Price</td>
        <td><?php echo $row["productprice"]; ?></td>
      </tr>
      <tr>
        <td>Origin</td>
        <td><?php echo $row["productorigin"]; ?></td>
      </tr>
      <tr>
        <td>Descreption</td>
        <td><?php echo $row["productdes"]; ?></td>
      </tr>
    </tbody>
  </table>
  <?php
    	}
    	?>
        </div>
     </div>
     </div>
     <?php 
     include("inc/footer.php")
      ?>