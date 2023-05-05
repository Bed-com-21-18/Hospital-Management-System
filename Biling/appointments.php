<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | News Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

      @media only screen and (max-width: 480px) {
          video {max-width: 100%;}
      }

      @media only screen and (min-width: 768px) {
          video {width: 640px;}
      }

      .embed-responsive {
        position: relative;
        display: block;
        height: 0;
        padding: 0;
        overflow: visible;
      }

      .embed-responsive:before {
        display: block;
        content: "";
      }

      .embed-responsive .embed-responsive-item,
      .embed-responsive iframe,
      .embed-responsive embed,
      .embed-responsive object,
      .embed-responsive video {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: 0;
      }

    </style>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/header.php');?>

   <?php echo "<br>";?>
   <?php echo "<br>";?>
   <?php echo "<br>";?>
 
    <!-- Page Content -->
    <div class="container-fluide m-3">
     
      <div class="row" style="margin-top: 4%">
        <div class="col-md-3">
                  
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header " style="color:#CE9A39;">whats new?</h5>
            <div class="card-body">
                      <ul class="mb-0">
                          <?php
                          $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts limit 8");
                          while ($row=mysqli_fetch_array($query)) {

                          ?>
                            <li>
                            <a style="color:#714B67;" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" ><?php echo htmlentities($row['posttitle']);?></a>
                            </li>
                                      <?php } ?>
                       </ul>
            </div>
          </div>

 

        </div>
        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <?php
$pid = intval($_GET['nid']);
$query = mysqli_query($con, "SELECT tblposts.PostTitle as posttitle, tblposts.PostImage, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url FROM tblposts WHERE tblposts.id='$pid'");
while ($row = mysqli_fetch_array($query)) {
?>

<div class=" mb-4"  style="overflow:hidden; height: 400px;">
  <div class="card-body">
    <h2 class="card-title" style="font-size:19px;"><?php echo htmlentities($row['posttitle']); ?></h2>

    <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">

    <p class="card-text">
      <?php
        $pt = $row['postdetails'];
        echo (substr($pt, 0));
      ?>
    </p>

    <?php
      // Check if the PostUrl field contains a valid video URL
      $url = $row['url'];
      $video_id = '';
      if (preg_match('/youtu\.be\/([^\?]*)/', $url, $match)) {
        $video_id = $match[1];
      } else if (preg_match('/youtube\.com\/watch\?v=([^\&\?]*)/', $url, $match)) {
        $video_id = $match[1];
      }

      if (!empty($video_id)) {
        // Embed the video using an iframe element
        ?>
        <div class="embed-responsive embed-responsive-16by9" >
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0"></iframe>
     `   </div>
        <?php
      }
    ?>

  </div>
  <div class="card-footer text-muted"></div>
</div>

<?php
}
?>


        </div>
      </div>

      <!-- /.row -->
<!-- if video url is posted -->


<!---Comment Section #714B67--->

 <div class="row m-0">
   <div class="col-md-12">
<div class="card my-4" style="background-color:#ffffff;" >
            <h5 class="card-header " style="color:black;">Leave a Comment:</h5>
            <div class="card-body">
              <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']);?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>


                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn text-light"	style="background-color:#CE9A39;" name="submit">Submit</button>
              </form>
            </div>
          </div>

  <!---Comment Display Section --->

 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>

        </div>
      </div>
    </div>
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60f2f779c5917ea2"></script> -->
  
      <?php include('includes/footer.php');?>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<!-- <link href="css/slider-image-crop.css" rel="stylesheet"> -->

<link href="fonts/css/fontawesome.css" rel="stylesheet">
<link href="fonts/css/brands.css" rel="stylesheet">
<link href="fonts/css/solid.css" rel="stylesheet">
