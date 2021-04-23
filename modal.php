<!-- Add Modal -->
<div class="myModal" ng-show="AddModal">
	<div class="modalContainer">
		<div class="modalHeader">
			<span class="headerTitle">Add New user</span>
			<button class="closeBtn pull-right" ng-click="AddModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>name:</label>
				<input type="text" class="form-control" ng-model="name" id="name">
				<span class="pull-right input-error" ng-show="errortname">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>email:</label>
				<input type="text" class="form-control" ng-model="email" id="email">
				<span class="pull-right input-error" ng-show="erroremail">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>usertype:</label>
				<input type="text" class="form-control" ng-model="usertype" id="usertype">
				<span class="pull-right input-error" ng-show="errorusertype">{{ errorMessage }}</span>
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="AddModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary" ng-click="addnew()"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="myModal" ng-show="EditModal">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Edit user</span>
			<button class="closeEditBtn pull-right" ng-click="EditModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>name:</label>
				<input type="text" class="form-control" ng-model="clickuser.name">
			</div>
			<div class="form-group">
				<label>email:</label>
				<input type="text" class="form-control" ng-model="clickuser.lastnemail">
			</div>
			<div class="form-group">
				<label>usertype:</label>
				<input type="text" class="form-control" ng-model="clickuser.usertype">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="EditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" ng-click="EditModal = false; updateuser();"><span class="glyphicon glyphicon-check"></span> Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="myModal" ng-show="DeleteModal">
	<div class="modalContainer">
		<div class="deleteHeader">
			<span class="headerTitle">Delete user</span>
			<button class="closeDelBtn pull-right" ng-click="DeleteModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Are you sure you want to delete user</h5>
			<h2 class="text-center">{{clickuser.name}} </h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="DeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" ng-click="DeleteModal = false; deleteuser(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	</div>
</div>
