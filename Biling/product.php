<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
 
<?php include('./constant/connect');
$sql = "SELECT medicine_id, medicine_name, medicine_image,quantity,brand_id,expdate,categories_id,active,status FROM medicine WHERE status = 1";
$result = $connect->query($sql);
//echo $sql;exit;

?>
       <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Medicine</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Medicine</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                
                
                
                 <div class="card">
                            <div class="card-body">
                              
                            <a href="add-product.php"><button class="btn btn-primary">Add Medicine</button></a>
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                                                <th style="width:10%;">Photo</th>

                            <th>Medicine Name</th>
                            <th>Rate</th>                           
                            <th>Quantity</th>
                            <th>Manufacturer</th>
                            <th>Category</th>
                            <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
foreach ($result as $row) {
    
    $sql="SELECT * from medicine_brands where brand_id='".$row['brand_id']."'";
    $result1 = $connect->query($sql);
    $row1=$result1->fetch_assoc();


    $sql="SELECT * from medicine_categories where categories_id='".$row['categories_id']."'";
    $result2 = $connect->query($sql);
    $row2=$result2->fetch_assoc();
    
    
    ?>
                                        <tr>
                                            
                                                
                                            <td class="text-center"><?php echo $row[' medicine_id'] ?></td>
                                            <td><img src="assets/myimages/<?php echo $row['medicine__image'];?>" style="width: 80px; height: 80px;"></td>


                                            <?php $d1=date('Y-m-d');
                                            //echo $d1.$row['expdate'];exit;
                                             if($row['expdate']>=$d1)
                                           { //echo "abc1"; ?>
                                               
                                               <td> <label class="label label-success"><?php echo $row['medicine__name'];?></label></td> 
                                         <?php  }
                                            if($row['expdate']<$d1) { //echo "abc"; ?>
                                               <td><label class="label label-danger"><?php echo $row['medicine__name'];?></label></td> 
                                               
                                           <?php
                                               } 
                                           ?>
                                            
                                              <td><?php echo $row['quantity'] ?></td>
                                              <td><?php echo $row1['brand_name'] ?></td>
                                             <td><?php echo $row2['categories_name'] ?></td>
                                            <td><?php  if($row['active']==1)
                                            {
                                                 
                                                 $activeBrands = "<label class='label label-success' ><h4>Available</h4></label>";
                                                 echo $activeBrands;
                                            }
                                            else{
                                                $activeBrands = "<label class='label label-danger'><h4>Not Available</h4></label>";
                                                echo $activeBrands;
                                            }?></td>
                                            <td>
            
                                                <a href="editproduct.php?id=<?php echo $row['medicine__id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                              

             
                                                <a href="php_action/removeProduct.php?id=<?php echo $row['medicine_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                           
                                                
                                                </td>
                                        </tr>
                                      
                                    </tbody>
                                   <?php    
}
?>
                               </table>
                                </div>
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>



