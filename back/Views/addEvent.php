<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Manage suppliers</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
table {
  border-collapse: collapse;
  width: 100%;
  table-layout: auto;
}
th {
background-color: #4c75af;
color: white;
padding: 8px
height: 70px;
} 
td {
  padding: 8px;
  text-align: left;
  border-bottom: 4px solid #ddd;
}
button{
  background-color: #4c75af; /* blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  box-shadow: 0  12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);

}
h2 {
  color: black;
  text-align: center;
}
h4 {
  text-align: center;
}
a:active {
  color: blue;
}
		</style>
</head>
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<h2 class="page-title">Manage events</h2>	
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-center">        <hr>
            <h4 class="text-blue h4">Add event </h4>

      <form action="" method="POST" class="form-group" style="margin-left:50px;" enctype="multipart/form-data">
        <fieldset>
          <label for="nom_E">Name event:</label><br>
          <input type="text" name="nom_E" id="nom_E" >
          <br>
		  <br>
          <input type="file" name="image_E" class="btn btn-secondary">
          <br>
          <label for="date_E">Date:</label><br>
          <input type="date" name="date_E" id="date_E">
          <br>
          <label for="description_E">Description:</label><br>
          <input type="text" name="description_E" id="description_E">
          <br>
                </select>
          <br>
          <button  class="btn btn-primary" id="submit" type="submit">Submit</button>
            <a href="afficherEvents.php" class="btn btn-success">back to list </a>
        </fieldset>
      </form>
      <!-- basic table  End -->
			
		</div>
	</div>
	<!-- js -->
  <script src="controleE.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

     
  </body>
</html>
<?php
    require_once '../Controller/eventC.php';
    require_once '../Model/event.php'; 

 	if (isset($_POST['submit']) && isset($_FILES['image_E'])) {
    $nom_E = $_POST['nom_E'];
	$date_E = $_POST['date_E'];
	$description_E = $_POST['description_E'];
    $img_name = $_FILES['image_E']['name'];
    $img_size = $_FILES['image_E']['size'];
    $tmp_name = $_FILES['image_E']['tmp_name'];
    $error = $_FILES['image_E']['error'];


      if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        
        $allowed_exs = array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs)){

                	$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			          	$img_upload_path = 'assets/'.$new_img_name;
			          	move_uploaded_file($tmp_name, $img_upload_path);
	

      
               // header("Location:view.php");
                               
                  $event = new event($nom_E,$new_img_name,$date_E,$description_E);
                  $eventC = new eventC();
                  $eventC->ajouterEvent($event);                
            }
            else{
             echo  "you can't uploade a file with that extension";
              //header("Location:view.php?error=$em");
            }


       }
      else{
      echo "unkownk error has occured while uploading";
      }
    }
  ?>

