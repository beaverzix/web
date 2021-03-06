<?php session_start(); ?>
<?php header('Content-Type: charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<style>
		body {
			background: #F1F3FA;
		}

        /* Profile container */
		.profile {
			margin: 20px 0;
		}

        /* Profile sidebar */
		.profile-sidebar {
			padding: 20px 0 10px 0;
			background: #fff;
		}
		.profile-userpic img {
			float: none;
			margin: 0 auto;
			width: 50%;
			height: 50%;
			-webkit-border-radius: 50% !important;
			-moz-border-radius: 50% !important;
			border-radius: 50% !important;
		}
		.profile-usertitle {
			text-align: center;
			margin-top: 20px;
		}
		.profile-usertitle-name {
			color: #5a7391;
			font-size: 16px;
			font-weight: 600;
			margin-bottom: 7px;
		}
		.profile-usertitle-job {
			text-transform: uppercase;
			color: #5b9bd1;
			font-size: 12px;
			font-weight: 600;
			margin-bottom: 15px;
		}
		.profile-userbuttons {
			text-align: center;
			margin-top: 10px;
		}
		.profile-userbuttons .btn {
			text-transform: uppercase;
			font-size: 11px;
			font-weight: 600;
			padding: 6px 15px;
			margin-right: 5px;
		}
		.profile-userbuttons .btn:last-child {
			margin-right: 0px;
		}
		.profile-usermenu {
			margin-top: 30px;
		}
		.profile-usermenu ul li {
			border-bottom: 1px solid #f0f4f7;
		}
		.profile-usermenu ul li:last-child {
			border-bottom: none;
		}
		.profile-usermenu ul li a {
			color: #93a3b5;
			font-size: 14px;
			font-weight: 500;
		}
		.profile-usermenu ul li a i {
			margin-right: 12px;
			font-size: 14px;
		}
		.profile-usermenu ul li a:hover {
			background-color: #fafcfd;
			color: #5b9bd1;
		}
		.profile-usermenu ul li.active {
			border-bottom: none;
		}
		.profile-usermenu ul li.active a {
			color: #5b9bd1;
			background-color: #f6f9fb;
			border-left: 2px solid #5b9bd1;
			margin-left: -2px;
		}
		/* Profile Content */
		.profile-content {
			padding: 20px;
			background: #fff;
			min-height: 460px;
		}
		
		

	</style>	
</head>

<body>
<?php
    include('connection.php');
    $sql = "SELECT * FROM `u_account` WHERE `u_id` = '". $_SESSION['user_id']."' ";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
?>   

<div class="container">
    <div class="row profile">
		<div class="col-md-3 col-lg-offset-0">
            <div class="profile-sidebar">
				<!-- END SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="img-responsive" src="<?php echo $row["img"]?>"> 
				</div>
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        <?php
                            echo $row["name"] . " " . $row["surname"];
                        ?>
					</div>
					
			  </div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!--
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				-->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="overview.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="meal_history.php">
							<i class="glyphicon glyphicon-cutlery"></i>
							Meal history </a>
						</li>
						<li>
							<a href="report.php">
							<i class="glyphicon glyphicon-ok"></i>
							 Report</a>
						</li>
						<li class="active">
							<a href="add_med.php">
							<i class="glyphicon glyphicon-plus"></i>
							Add medicine</a>
						</li>
					</ul>
				</div>
                <!-- END MENU -->
            </div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Medicine name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter the medicine name"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<!--
						<div class="form-group">
							
							<label for="dosage" class="cols-sm-2 control-label">Medicine dosage</label>
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="dosage" id="dosage"  placeholder="Enter the medicine dosage"/>
								</div>
							</div>
						</div>
					-->
						<div class="form-group">
							<label for="dosage">Medicine dosage:</label>
							<select class="form-control" id="dosage">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div> 
					</div>
				</div>
				<form action="">
					<label class="checkbox-inline"><input type="checkbox" value="med_time_1">Breakfast</label>
					<label class="checkbox-inline"><input type="checkbox" value="med_time_2">Lunch</label>
					<label class="checkbox-inline"><input type="checkbox" value="med_time_3">Dinner</label> 
					<label class="checkbox-inline"><input type="checkbox" value="med_time_4">Before meal</label>
					<label class="checkbox-inline"><input type="checkbox" value="med_time_5">After meal</label>
					<label class="checkbox-inline"><input type="checkbox" value="med_time_6">Before bed</label>
				
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-10">
						<input type="submit" class="btn btn-default" value="submit">
					</div>
                </div>
                </form>
				<div class="row">
					<div class="col-md-12">
						<h4>Medicine list</h4>
						<div class="table-responsive">
							<table id="mytable" class="table table-bordred table-striped">
								<thead>
									<th>Medicine</th>
									<th>Dosage</th>
									<th>Time</th>
									<th>Edit</th>
									<th>Delete</th>
								</thead>
								<tbody>
									<tr>
										<td>Amoxicillin</td>
										<td>2</td>
										<td>After breakast, After dinner</td>
										<td>
											<p data-placement="top" data-toggle="tooltip" title="Edit">
											<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
												<span class="glyphicon glyphicon-pencil"></span>
											</button>
											</p>
										</td>
										<td>
											<p data-placement="top" data-toggle="tooltip" title="Delete">
												<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
													<span class="glyphicon glyphicon-trash"></span>
												</button>
											</p>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button>
								<h4 class="modal-title custom_align" id="Heading">Edit medicine detail</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input class="form-control " type="text" placeholder="Medicine">
								</div>
								<div class="form-group">
									<select class="form-control" id="sel2">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
								<div class="form-group">
									<label class="checkbox-inline"><input type="checkbox" value="med_time_1">Breakfast</label>
									<label class="checkbox-inline"><input type="checkbox" value="med_time_2">Lunch</label>
									<label class="checkbox-inline"><input type="checkbox" value="med_time_3">Dinner</label> 
									<label class="checkbox-inline"><input type="checkbox" value="med_time_4">Before meal</label>
									<label class="checkbox-inline"><input type="checkbox" value="med_time_5">After meal</label>
									<label class="checkbox-inline"><input type="checkbox" value="med_time_6">Before bed</label>
								</div>
							</div>
							<div class="modal-footer ">
								<button type="button" class="btn btn-warning btn-lg" style="width: 100%;">
									<span class="glyphicon glyphicon-ok-sign"></span> Update</button>
							</div>
						</div>
						<!-- /.modal-content --> 
					</div>
					<!-- /.modal-dialog --> 
				</div>
    
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button>
								<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
							</div>
							<div class="modal-body">
								<div class="alert alert-danger">
									<span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?
								</div>
							</div>
							<div class="modal-footer ">
								<button type="button" class="btn btn-success" >
									<span class="glyphicon glyphicon-ok-sign"></span> Yes
								</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">
									<span class="glyphicon glyphicon-remove"></span> No
								</button>
							</div>
						</div>
						<!-- /.modal-content --> 
					</div>
					<!-- /.modal-dialog --> 
				</div>
			</div>
		</div>
		<!--  content end here  -->
	</div>
	<div class="row">
		<div class="col-lg-6">&nbsp;</div>
	</div>
</div>
<br>
<br>



<script>
	$(document).ready(function() {
		$('#datatable').dataTable();
		$("[data-toggle=tooltip]").tooltip();
	} );
</script>


</body>
</html>