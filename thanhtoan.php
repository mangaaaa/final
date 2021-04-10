 <?php 
 session_start();
require_once("inc/conn.php");
include("inc/header.php");
 ?>
 <?php 
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $total=$_POST['total'];
  $date=$_POST['date'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $add=$_POST['add'];
  $note=$_POST['note'];
  $sql="INSERT INTO invoices(create_date,total,shipping_address,order_status,cusname,cusphone,cusemail,note) 
  VALUES ('$date','$total','$add','Chờ xác nhận','$name','$phone','$email','$note')";
if(pg_query($dbconn,$sql)){
  header("Location: thanhtoan.php");
  ?>
  <?php
}
else{
  echo "Error: ";
}
}
 ?>
 <div class="container"></div>
 <h3 style="text-align: center;">Bạn đã thanh toán thành công đơn hàng của bạn sẽ được xác nhận nhanh nhất</h3>
 <a href="index.php" ><h5 style="text-align: center;">Back to hompage</h5></a>
 <div style="text-align: center;">
 <img src="img/tenor.gif" style="width: 50%;">
  </div>  
  </div>
 <?php
 include("inc/footer.php"); 
  ?>