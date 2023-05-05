<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
  $productName = $_POST['productName'];
  $image = $_FILES['productImage']['name'];
  $target = "../assets/myimages/" . basename($image);
  $upload = move_uploaded_file($_FILES['productImage']['tmp_name'], $target);
  
  if ($upload) {
    $msg = "Image uploaded successfully";
    echo $msg;
  } else {
    $msg = "Failed to upload image";
    echo $msg;
    exit;
  }
  
  $quantity = $_POST['quantity'];
  $rate = $_POST['rate'];
  $brandName = $_POST['brandName'];
  $categoryName = $_POST['categoryName'];
  $mrp = $_POST['mrp'];
  $bno = $_POST['bno'];
  $expdate = $_POST['expdate'];
  $productStatus = $_POST['productStatus'];
  $orderDate = date('Y-m-d');
  
  $sql = "INSERT INTO medicine(medicine_name, medicine_image, brand_id, category_id, quantity, price, mrp, batch_no, expiry_date, added_date, active, status) 
          VALUES ('$productName', '$image', '$brandName', '$categoryName', '$quantity', '$rate', '$mrp', '$bno', '$expdate', '$orderDate', '$productStatus', 1)";
  
  if ($connect->query($sql) === TRUE) {
    $valid['success'] = true;
    $valid['messages'] = "Successfully Added";
    header('location:../product.php');
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    exit;
  }


$connect->close();


	echo json_encode($valid);
 
} // /if $_POST