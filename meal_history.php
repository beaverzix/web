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
		
		/* Add a black background color to the top navigation bar */
		.topnav {
			overflow: hidden;
			background-color: #e9e9e9;
		}

        /* Style the links inside the navigation bar */
		.topnav a {
			float: left;
			display: block;
			color: black;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Style the "active" element to highlight the current page */
		.topnav a.active {
			background-color: #2196F3;
			color: white;
		}

		/* Style the search box inside the navigation bar */
		.topnav input[type=text] {
			float: right;
			padding: 6px;
			border: none;
			margin-top: 8px;
			margin-right: 16px;
			font-size: 17px;
        }

		/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
		@media screen and (max-width: 600px) {
		    .topnav a, .topnav input[type=text] {
			    float: none;
			    display: block;
			    text-align: left;
			    width: 100%;
			    margin: 0;
			    padding: 14px;
		    }
		    .topnav input[type=text] {
			    border: 1px solid #ccc;
		    }
		}
		.back-to-top {
			cursor: pointer;
			position: fixed;
			bottom: 20px;
			right: 20px;
			display:none;
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
						<li class="active">
							<a href="meal_history.php">
							<i class="glyphicon glyphicon-cutlery"></i>
							Meal history </a>
						</li>
						<li>
							<a href="report.php">
							<i class="glyphicon glyphicon-ok"></i>
							 Report</a>
						</li>
						<li>
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
			   	<div class="topnav">
                    <form action="" method="POST">
                        From: <input type="date" name="fromday"> to <input type="date" name="today">
                        <input type="submit" name="submit" class="btn btn-primary" value="submit"> 
                        <!--<input type="text" name="daterange" value="09/20/2015 - 09/20/2015"/>-->
                    </form>
                    
                </div>
                <?php
                    if(isset($_POST['fromday']) and $_POST['today'] ){
                        $fromday = $_POST['fromday'];
                        $today = $_POST['today'];
                    
                    //echo strcmp($_POST['fromday'],$_POST['today']); //-1 correct form 0 sameday 1 invalid
                    $his_sql = "SELECT * FROM `history` WHERE `date` BETWEEN '". $_POST['fromday']."' AND '". $_POST['today']."' ";
                    $his_result= $conn->query($his_sql);
                ?>
                <?php if ($his_result->num_rows == 0): ?>
                <p>no result</p>
                <?php else : ?>  
				<table class="table table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Activity</th>
				  	</tr>
				</thead>
					<tbody>
                        <?php
                            while($his_row = $his_result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $his_row["date"]?></td>
                                <td><?php echo $his_row["time"]?></td>
                                <td>
                                    <?php 
                                        if(!empty($his_row["nutrition_id"])){
                                            $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                                            $nut_result= $conn->query($nut_sql);
                                            $print_row = $nut_result->fetch_assoc();
                                            echo "Eat ".$print_row['name'];
                                        }
                                        else{
                                            $med_sql = "SELECT * FROM `med` WHERE `med_id` = '".$his_row["med_id"]."' ";
                                            $med_result= $conn->query($med_sql);
                                            $print_row = $med_result->fetch_assoc();
                                            echo "Take ".$print_row['name'];
                                        }
                                        ?>
                                </td>
                              </tr>
                            <?php
                            }
                        ?>
				  		
                    </tbody>
                </table>
                <?php endif ?>
                <?php } ?>
                  
				
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            &nbsp;
        </div>
    </div>
</div>
<br>
<br>


<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    
  });
});
</script>

</body>
</html>