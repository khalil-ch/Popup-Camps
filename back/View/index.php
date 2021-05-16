<?PHP
	include_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
	include_once "../Controller/CampgroundC.php";

	session_start();
	if(isset($_SESSION['alogin'])){
		$campgroundC=new CampgroundC();
		$reviewC= new ReviewC();
	
		if (isset($_GET['Recherche'])) {
			$listCamps=$campgroundC->rechercherCamp($_GET['Recherche']);
		}
		else{
		$listCamps=$campgroundC->afficherCampgrounds();
		$reviewC=new ReviewC();
		$listReviews=$reviewC->afficherReview();
		}
	}
	else{
		header("location:../../admin/index.php");
	}



	function log_as_json2($vars)
    {
    if(is_resource($vars)) {
        return;
    }
    else {
        if($vars)
        {
            $json =  @json_encode($vars);
            print "<script>console.log($json);</script>";
        }
    }
    }
?>
<?php 
$campsArray = array();
$listOfCamps=$campgroundC->afficherCampgrounds();
$i=0;
foreach ($listOfCamps as $oneCamp) {
    $compteur=$reviewC->compterReview($oneCamp['NomCamp']);
    $campsArray[$i++]=array("label"=> $oneCamp['NomCamp'], "y"=> $compteur['COUNT(NomCampRV)']);
}
$i=0;
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

	<script>
		// window.onload = function () {

		// 	var chart = new CanvasJS.Chart("chartContainer", {
		// 		animationEnabled: true,
		// 		exportEnabled: true,
		// 		title: {
		// 			text: "Average Expense Per Day  in Thai Baht"
		// 		},
		// 		subtitles: [{
		// 			text: "Currency Used: Thai Baht (฿)"
		// 		}],
		// 		data: [{
		// 			type: "pie",
		// 			showInLegend: "true",
		// 			legendText: "{label}",
		// 			indexLabelFontSize: 16,
		// 			indexLabel: "{label} - #percent%",
		// 			yValueFormatString: "฿#,##0",
		// 			dataPoints: < ? php echo json_encode($campsArray, JSON_NUMERIC_CHECK); ? >
		// 		}]
		// 	});
		// 	chart.render();

		// }
	</script>
</head>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form method="" action="index.php?Camp=<?PHP echo $_POST['Recherche']; ?>">
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here" name="Recherche"
							id="Recherche">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="text-right">
									<button class="btn btn-primary" type="submit">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name">Ross C. Lopez</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			<div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
						alt=""></a>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i
								class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i
								class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
								aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i
								class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i
								class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<?php 
	include_once 'includes/leftbar.php';
	?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
							hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure
							fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">2020</div>
								<div class="weight-600 font-14">Contact</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">400</div>
								<div class="weight-600 font-14">Deals</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">350</div>
								<div class="weight-600 font-14">Campaign</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			<!-- Table des donnees -->
			<div class="row" align="center">
				<div class="col"></div>
				<div class="col-2" align="center">
					<a href="../view/form-basic.php" class="btn btn-info mb-3">Ajouter un Campground</a>
				</div>
				<div class="col-2">
					<form method="POST" action="index.php?Sort=byNote" align="center">
						<button class="btn btn-info mb-3" type="submit">Sort by note</button>
						<input type="hidden" value=<?PHP echo "p['idProduit'];" ?> name="id">
					</form>
				</div>
				<div class="col-2" align="center">
					<form method="POST" action="index.php?Sort=byPopularity">
						<button class="btn btn-info mb-3" type="submit">Sort by Popularity</button>
						<input type="hidden" value=<?PHP echo "idProduit" ; ?> name="id">
					</form>
				</div>
				<div class="col-2" align="center">
					<form method="POST" action="index.php">
						<button class="btn btn-info mb-3" type="submit">Cancel</button>
						<input type="hidden" value=<?PHP echo "idProduit" ; ?> name="id">
					</form>
				</div>
				<div class="col-2 " align="center">
				<a href="pdfCamps.php" class="btn btn-info mb-3">Print Pdf</a>
				</div>
				<div class="col "></div>
			</div>
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Campgrounds</h2>
				<?php 
				if (isset($_GET['Sort'])) {
					if($_GET['Sort']=="byNote"){
						echo "ByyyyyyNoooooote";
						$avgReviews = $reviewC->avgReviews();
						log_as_json2($avgReviews);
						//COUNT(note), NomCampRv
						?>
				<table id="data" class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Moyenne note</th>
							<th>Nom Campgroud</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($avgReviews as $avgReview){
					?>
						<tr>
							<td class="table-plus">
								<?php echo $avgReview['AVG(note)']; ?>
							</td>
							<td><?php echo $avgReview['NomCampRv']; ?></td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
				<?php
					}
					if($_GET['Sort']=="byPopularity"){
						echo "byyyyyyyyyyPoooooooooop";
						$popularity = $reviewC->sortByPop();
						log_as_json2($popularity);
						?>
				<table id="data" class="data-table table nowrap">
					<thead>
						<tr>
							<th>Nombre de Reviews</th>
							<th>Nom Campground</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($popularity as $onePop){
					?>
						<tr>
							<td class="table-plus">
								<?php echo $onePop['COUNT(note)']; ?>
							</td>
							<td><?php echo $onePop['NomCampRv']; ?></td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
				<?php
					}
				}
				else{
			?>

				<table id="data" class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Id</th>
							<th>Nom</th>
							<th>Image</th>
							<th>Emplacement</th>
							<th>Description</th>
							<th>Proprietaire</th>
							<th>Prix</th>
							<th>Duree</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($listCamps as $Camp){
					?>
						<tr>
							<td class="table-plus">
								<?php echo $Camp['idProduit']; ?>
							</td>
							<td><?php echo $Camp['NomCamp']; ?></td>
							<?php $path = $Camp['imageCamp'];?>
							<td> <img style="max-width: 50%;" src="<?php echo $path;?>" alt=""></td>
							<td>
								<h5 class="font-16"><?php echo $Camp['prix']; ?></h5>
							</td>
							<td><?php echo $Camp['emplacement']; ?></td>
							<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
								<?php echo $Camp['description']; ?></td>
							<td><?php echo $Camp['duree']; ?></td>
							<td><?php echo $Camp['proprietaire']; ?></td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
										role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item"
											href="view.php?nomCampRv=<?PHP echo $Camp['NomCamp']; ?>"><i
												class="dw dw-eye"></i> View</a>
										<a class="dropdown-item"
											href="advanced-components.php?idProduit=<?PHP echo $Camp['idProduit']; ?>"><i
												class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
											<form method="POST" action="../Views/supprimerCampground.php">
												<button type="submit">Supprimer</button>
												<input type="hidden" value=<?PHP echo $Camp['idProduit']; ?> name="id">
											</form>
										</a>
									</div>
								</div>
							</td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
				<?php } ?>
				<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
				</script>
				<script type="text/javascript">
					$("#btnPrint").live("click", function () {
						var divContents = $("#data").html();
						var printWindow = window.open('', '', 'height=400,width=800');
						printWindow.document.write('<html><head><title>DIV Contents</title>');
						printWindow.document.write('</head><body >');
						printWindow.document.write(divContents);
						printWindow.document.write('</body></html>');
						printWindow.document.close();
						printWindow.print();
					});
				</script>
				<form id="form1">
					<div id="">
						This content needs to be printed.
					</div>
					<input type="button" value="Print Div Contents" id="btnPrint" />
				</form> -->
				<h2 class="h4 pd-20">Best Selling Products</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Id</th>
							<th>Campground associe</th>
							<th>Note</th>
							<th>User</th>
							<th>Comment</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
				foreach($listReviews as $review){
					?>
						<tr>
							<td><?php echo $review['idReview']; ?></td>
							<td><?php echo $review['NomCampRv']; ?></td>
							<td><?php echo $review['note']; ?></td>
							<td><?php echo $review['user']; ?></td>
							<td><?php echo $review['comment']; ?></td>
							<td>
								<form method="POST" action="supprimerReview.php">
									<button type="submit">Supprimer</button>
									<input type="hidden" value=<?PHP echo $review['idReview']; ?> name="id">
								</form>
							</td>
							<td>
								<a href="../Views/modifierReview.php?idReview=<?PHP echo $review['idReview']; ?>">
									Modifier </a>
							</td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
					Hingarajiya</a>
			</div>

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Launch demo modal
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div>
								...
								<a href="test.php">Chart</a>
								<a href="test2.php">Histogram</a>
								<div id="chartContainer" style="height: 370px; width: 100%;"></div>
								<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
	</script>
</body>

</html>