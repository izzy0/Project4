<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
</head>
<title>Rebus Many-From-A-List</title>
<body>
<?PHP
session_start();
require('session_validation.php');
?>
<?PHP echo getTopNav(); ?>
<div class="divTitle" align="center">
    <font class="font">Rebus Puzzle (Many from a List)</font>
</div>
<br>
<div>
    <form method="post" action="generate_many_from_a_list.php">
        <div class="container">
            <textarea class="form-control" rows="10" id="input" name="wordInput"></textarea>
            <br/>
            <div style="text-align:center">
                <input class="main-buttons" type="submit" value="Show me.."/>
            </div>
        </div>
    </form>
</div>
</body>
</html>
