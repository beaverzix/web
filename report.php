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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
						<li>
							<a href="meal_history.php">
							<i class="glyphicon glyphicon-cutlery"></i>
							Meal history </a>
						</li>
						<li class="active">
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
				<!--  content start here  -->
				<div class="row">
					<div class="col-md-12">
						<h3>For past 7 days user has:</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-11">
						<!--<p>Eat 19 out of 21 Meals</p>-->
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<canvas id="calchart"></canvas>
					</div>
					<div class="col-md-6">
						<canvas id="carbchart"></canvas>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<canvas id="prochart"></canvas>
					</div>
					<div class="col-md-6">
						<canvas id="fatchart"></canvas>
					</div>
				</div>
				
				<!--
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
						70
					</div>
				</div>
                -->
                <!--
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-11">
					  <p>Take 12 out of 14 Medicine dosages</p>
					</div>
                </div>
                -->
				<table class="table table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Medicine</th>
				  	</tr>
				</thead>
					<tbody>
				  		<tr>
                            <?php
                                $today = date("Y-m-d");
                                $fromday = date('Y-m-d', strtotime('-7 days'));
                                $his2_sql = "SELECT * FROM `history` WHERE `date` BETWEEN '". $fromday."' AND '". $today."' ";
                                $his2_result= $conn->query($his2_sql);
                                while($his2_row = $his2_result->fetch_assoc()){
                                    if(!empty($his2_row["nutrition_id"])){
                                    }
                                    else{
                                        $med_sql = "SELECT * FROM `med` WHERE `med_id` = '".$his2_row["med_id"]."' ";
                                        $med_result= $conn->query($med_sql);
                                        $print2_row = $med_result->fetch_assoc();
                                        ?>
                                        <td><?php echo $his2_row["date"] ?></td>
							            <td><?php echo $his2_row["time"]?></td>
							            <td><?php echo $print2_row["name"]?> </td>
                                        <?php
                                    }
                                }
                            ?>
							
				  		</tr>
					</tbody>
			  	</table>
				<!--  content end here  -->
			</div>
		</div>
	</div>
	
</div>
<br>
<br>
<div class="container">
<?php
    $todate = date("Y-m-d");
    //day1
    $fromdate = date('Y-m-d', strtotime('-7 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal1=0;
    $carb1=0;
    $prot1=0;
    $fat1=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal1+=$print_row['calories(kcal)'];
                $carb1+=$print_row['total_carb(g)'];
                $prot1+=$print_row['protein(g)'];
                $fat1+=$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
    }
    //day2
    $fromdate = date('Y-m-d', strtotime('-6 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal2=0;
    $carb2=0;
    $prot2=0;
    $fat2=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal2+=$print_row['calories(kcal)'];
                $carb2+=$print_row['total_carb(g)'];
                $prot2+=$print_row['protein(g)'];
                $fat2+=$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
    }
    //day3
    $fromdate = date('Y-m-d', strtotime('-5 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal3=0;
    $carb3=0;
    $prot3=0;
    $fat3=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal3+=(int)$print_row['calories(kcal)'];
                $carb3+=(int)$print_row['total_carb(g)'];
                $prot3+=(int)$print_row['protein(g)'];
                $fat3+=(int)$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
        
    }
    //day4
    $fromdate = date('Y-m-d', strtotime('-4 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal4=0;
    $carb4=0;
    $prot4=0;
    $fat4=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal4+=$print_row['calories(kcal)'];
                $carb4+=$print_row['total_carb(g)'];
                $prot4+=$print_row['protein(g)'];
                $fat4+=$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
    }
    //day5
    $fromdate = date('Y-m-d', strtotime('-3 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal5=0;
    $carb5=0;
    $prot5=0;
    $fat5=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal5+=$print_row['calories(kcal)'];
                $carb5+=$print_row['total_carb(g)'];
                $prot5+=$print_row['protein(g)'];
                $fat5+=$print_row['total_fat(%)'];
            }
            else{
               
            }
        }
    }
    //day6
    $fromdate = date('Y-m-d', strtotime('-2 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal6=0;
    $carb6=0;
    $prot6=0;
    $fat6=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal6+=$print_row['calories(kcal)'];
                $carb6+=$print_row['total_carb(g)'];
                $prot6+=$print_row['protein(g)'];
                $fat6+=$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
    }
    //day7
    $fromdate = date('Y-m-d', strtotime('-1 days'));
    $his_sql = "SELECT * FROM `history` WHERE `date` = '".$fromdate."' ";
    $his_result= $conn->query($his_sql);
    $cal7=0;
    $carb7=0;
    $prot7=0;
    $fat7=0;
    if($his_result->num_rows >= 1){
        while($his_row = $his_result->fetch_assoc()){
            if(!empty($his_row["nutrition_id"])){
                $nut_sql = "SELECT * FROM `nutrition` WHERE `nutrition_id` = '".$his_row["nutrition_id"]."' ";
                $nut_result= $conn->query($nut_sql);
                $print_row = $nut_result->fetch_assoc();
                $cal7+=$print_row['calories(kcal)'];
                $carb7+=$print_row['total_carb(g)'];
                $prot7+=$print_row['protein(g)'];
                $fat7+=$print_row['total_fat(%)'];
            }
            else{
                
            }
        }
    }
?>
</div>



<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<script>
var ctx = document.getElementById('calchart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo date('d', strtotime('-7 days')) ?>, <?php echo date('d', strtotime('-6 days')) ?>, <?php echo date('d', strtotime('-5 days')) ?>, <?php echo date('d', strtotime('-4 days')) ?>, <?php echo date('d', strtotime('-3 days')) ?>, <?php echo date('d', strtotime('-2 days')) ?>, <?php echo date('d', strtotime('-1 days')) ?>],
        datasets: [{
            label: "Calorie",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo $cal1 ?>, <?php echo $cal2 ?>, <?php echo $cal3 ?>, <?php echo $cal4 ?>, <?php echo $cal5 ?>, <?php echo $cal6 ?>, <?php echo $cal7 ?>],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
<script>
var ctx = document.getElementById('carbchart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo date('d', strtotime('-7 days')) ?>, <?php echo date('d', strtotime('-6 days')) ?>, <?php echo date('d', strtotime('-5 days')) ?>, <?php echo date('d', strtotime('-4 days')) ?>, <?php echo date('d', strtotime('-3 days')) ?>, <?php echo date('d', strtotime('-2 days')) ?>, <?php echo date('d', strtotime('-1 days')) ?>],
        datasets: [{
            label: "Carbohydrate(gram)",
            backgroundColor: 'rgb(196, 255, 77)',
            borderColor: 'rgb(196, 255, 77)',
            data: [<?php echo $carb1 ?>, <?php echo $carb2 ?>, <?php echo $carb3 ?>, <?php echo $carb4 ?>, <?php echo $carb5 ?>, <?php echo $carb6 ?>, <?php echo $carb7 ?>],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
<script>
var ctx = document.getElementById('prochart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo date('d', strtotime('-7 days')) ?>, <?php echo date('d', strtotime('-6 days')) ?>, <?php echo date('d', strtotime('-5 days')) ?>, <?php echo date('d', strtotime('-4 days')) ?>, <?php echo date('d', strtotime('-3 days')) ?>, <?php echo date('d', strtotime('-2 days')) ?>, <?php echo date('d', strtotime('-1 days')) ?>],
        datasets: [{
            label: "Protein(gram)",
            backgroundColor: 'rgb(255, 51, 51)',
            borderColor: 'rgb(255, 51, 51)',
            data: [<?php echo $prot1 ?>, <?php echo $prot2 ?>, <?php echo $prot3 ?>, <?php echo $prot4 ?>, <?php echo $prot5 ?>, <?php echo $prot6 ?>, <?php echo $prot7 ?>],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
<script>
var ctx = document.getElementById('fatchart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo date('d', strtotime('-7 days')) ?>, <?php echo date('d', strtotime('-6 days')) ?>, <?php echo date('d', strtotime('-5 days')) ?>, <?php echo date('d', strtotime('-4 days')) ?>, <?php echo date('d', strtotime('-3 days')) ?>, <?php echo date('d', strtotime('-2 days')) ?>, <?php echo date('d', strtotime('-1 days')) ?>],
        datasets: [{
            label: "Fat ",
            backgroundColor: 'rgb(255, 219, 77)',
            borderColor: 'rgb(255, 219, 77)',
            data: [<?php echo $fat1 ?>, <?php echo $fat2 ?>, <?php echo $fat3 ?>, <?php echo $fat4 ?>, <?php echo $fat5 ?>, <?php echo $fat6 ?>, <?php echo $fat7 ?>],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>


</body>
</html>