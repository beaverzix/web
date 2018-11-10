<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row"><br><br></div>
        <?php
            echo $_POST['email'];
            echo $_POST['pwd'];
        ?>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <form action="" method="POST">
                    <div class="panel-heading">login</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pwd">
                        </div>                </div>
                    <div class="panel-footer">
                        <input type="submit" name="submit" class="btn btn-success btn-block" value="login"> 
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</body>
</html>