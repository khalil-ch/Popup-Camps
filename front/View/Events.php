<?php
    include './header.php';
	require_once "../Controller/eventC.php";

	$eventC =new eventC();
	$rows=$eventC->afficherEvent();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <link href="assets/css/style.css" rel="stylesheet">


      <!-- font awesome -->

      <script src="https://use.fontawesome.com/your-embed-code.js"></script>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <!-- my custom input css -->
       <link rel="stylesheet" href="styleSearchInput.css">
	   <style> 
	.img {
    float: left;
    width:  100px;
    height: 100px;
}
</style>
</head>
<body>

<div class="content-wrapper">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<a href = "searchEvent.php" class="btn btn-primary shop-item-button">Search</a>				 	
				<!-- basic table  Start -->				
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-center">
            
        </form>
      </div>
    <section>
            <div class="section-inner"> 
                <div class="container p-50">
                   <?php
                $i=0;
                echo '<div class="row">';
			foreach($rows as $row){
				$string  =  '<div class="col-lg-4 col-md-6 mb-4">
				<div class="listing-item">
				  <div class="listing-image">
					<img src="../../back/Views/assets/'.$row["image_E"]. '"class="img-fluid" alt="Image">
				  </div>
				  <div class="listing-item-content">
					<a class="px-3 mb-3 category bg-primary" href="#">'.$row["date_E"].'</a>
					<h2 class="mb-1"><a href="afficherEvent.php?id='.$row["idEvent"].'">'.$row["nom_E"] .'</a></h2>
				  </div>
				</div>
			  </div>';
                      $i++;
                        
                        if(($i-1) %3 ==0 && $i>0){
                        echo '</div> <div class="row">'.$string;
                        }
                        else{
                        echo $string ;
                        }
                        }

        
                 ?>
                        
                  
                </div>
            </div>
        </section>
</body>
</html>
<?php