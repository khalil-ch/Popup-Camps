var app = angular.module('app', ['angularUtils.directives.dirPagination']);
app.controller('memberdata',function($scope, $http, $window){
	$scope.AddModal = false;
    $scope.EditModal = false;
    $scope.DeleteModal = false;

    $scope.errorFirstname = false;

    $scope.showAdd = function(){
    	$scope.id = null;
    	$scope.name = null;
    	$scope.email = null;
        $scope.password = null;
        $scope.usertype = null;
    	$scope.errorid = false;
    	$scope.errorname = false;
    	$scope.erroremail = false;
        $scope.errorpassword = false;
        $scope.errorusertype = false;
    	$scope.AddModal = true;
    }
  
    $scope.fetch = function(){
    	$http.get("fetch.php").success(function(data){ 
	        $scope.users = data; 
	    });
    }

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   
        $scope.reverse = !$scope.reverse;
    }

    $scope.clearMessage = function(){
    	$scope.success = false;
    	$scope.error = false;
    }

    $scope.addnew = function(){
    	$http.post(
            "add.php", {
                'id': $scope.id,
                'name': $scope.name,
                'email':$scope.email,
                'password':$scope.password,
                 'usertype':$scope.usertype,
            }
        ).success(function(data) {
        	if(data.id){
        		$scope.errorid = true;
        $scope.errorname = false;
        $scope.erroremail = false;
        $scope.errorpassword = false;
        $scope.errorusertype = false;
        		$scope.errorMessage = data.message;
        		$window.document.getElementById('id').focus();
        	}
        	else if(data.name){
        		$scope.errorid = false;
        $scope.errorname = true;
        $scope.erroremail = false;
        $scope.errorpassword = false;
        $scope.errorusertype = false;
        		$scope.errorMessage = data.message;
        		$window.document.getElementById('name').focus();
        	}
        	else if(data.email){
        		$scope.errorid = false;
        $scope.errorname = false;
        $scope.erroremail = true;
        $scope.errorpassword = false;
        $scope.errorusertype = false;
        		$scope.errorMessage = data.message;
        		$window.document.getElementById('email').focus();
        	}
            else if(data.password){
                $scope.errorid = false;
        $scope.errorname = false;
        $scope.erroremail = false;
        $scope.errorpassword = true;
        $scope.errorusertype = false;
                $scope.errorMessage = data.message;
                $window.document.getElementById('password').focus();
            }
            else if(data.usertype){
                $scope.errorid = false;
        $scope.errorname = false;
        $scope.erroremail = false;
        $scope.errorpassword = false;
        $scope.errorusertype = true;
                $scope.errorMessage = data.message;
                $window.document.getElementById('usertype').focus();
            }
        	else if(data.error){
                $scope.errorid = false;
        		 $scope.errorname = false;
        $scope.erroremail = false;
        $scope.errorpassword = false;
        $scope.errorusertype = false;
        		$scope.error = true;
        		$scope.errorMessage = data.message;
        	}
        	else{
        		$scope.AddModal = false;
        		$scope.success = true;
        		$scope.successMessage = data.message;
        		$scope.fetch();
        	}
        });
    }

    $scope.selectuser = function(user){
    	$scope.clickMember = member;
    }

    $scope.showEdit = function(){
    	$scope.EditModal = true;
    }

    $scope.updateuser = function(){
    	$http.post("edit.php", $scope.clickuser)
    	.success(function(data) {
        	if(data.error){
        		$scope.error = true;
        		$scope.errorMessage = data.message;
        		$scope.fetch();
        	}
        	else{
        		$scope.success = true;
        		$scope.successMessage = data.message;
        	}
        });
    }

    $scope.showDelete = function(){
    	$scope.DeleteModal = true;
    }

    $scope.deleteuser = function(){
    	$http.post("delete.php", $scope.clickuser)
    	.success(function(data) {
        	if(data.error){
        		$scope.error = true;
        		$scope.errorMessage = data.message;
        	}
        	else{
        		$scope.success = true;
        		$scope.successMessage = data.message;
        		$scope.fetch();
        	}
        });
    }

});