<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <title> users management </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body ng-controller="memberdata" ng-init="fetch()">
<div class="container">
    <h1 class="page-header text-center">users management </h1>
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-success text-center" ng-show="success">
				<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-check"></i> {{ successMessage }}
			</div>
			<div class="alert alert-danger text-center" ng-show="error">
				<button type="button" class="close" ng-lick="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-warning"></i> {{ errorMessage }}
			</div>
			<div class="row">
				<div class="col-md-12">
					<button href="" class="btn btn-primary" ng-click="showAdd()"><i class="fa fa-plus"></i> New Member</button>
					<span class="pull-right">
						<input type="text" ng-model="search" class="form-control" placeholder="Search">
					</span>
				</div>
			</div>
			<table class="table table-bordered table-striped" style="margin-top:10px;">
				<thead>
                    <tr>
                        <th ng-click="sort('name')" class="text-center">name
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='name'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='name'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                        </th>
                        <th ng-click="sort('email')" class="text-center">email
	                        <span class="pull-right">
	                       		<i class="fa fa-sort gray" ng-show="sortKey!='email'"></i>
	                       		<i class="fa fa-sort" ng-show="sortKey=='email'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
	                       	</span>
                        </th>
                        <th ng-click="sort('usertype')" class="text-center">usertype
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='usertype'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='usertype'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th class="text-center">Action</th>
                    </tr>
                </thead>
				<tbody>
					<tr dir-paginate="user in users|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
						<td>{{user.name }}</td>
						<td>{{ user.email }}</td>
						<td>{{ user.usertype }}</td>
						<td>
							<button type="button" class="btn btn-success" ng-click="showEdit(); selectuser(user);"><i class="fa fa-edit"></i> Edit</button> 
							<button type="button" class="btn btn-danger" ng-click="showDelete(); selectuser(user);"> <i class="fa fa-trash"></i> Delete</button>
						</td>

					</tr>
				</tbody>
			</table>
			<div class="pull-right" style="margin-top:-30px;">
				<dir-pagination-controls
				   max-size="5"
				   direction-links="true"
				   boundary-links="true" >
				</dir-pagination-controls>
			</div>
		</div>
	</div>
	<?php include('modal.php'); ?>
</div>
<script src="dirPaginate.js"></script>
<script src="angular.js"></script>
</body>
</html>