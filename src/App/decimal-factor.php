<?php
include('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admistation | Made peaple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
    <link rel="stylesheet" href="css/themes.css">
    <link rel="stylesheet" href="css/responsiveslides.css">

    <style type="text/css">

    </style>
</head>
<body>
<?php include ('menu.php')?>
<div id="right">
    <div class="content">
        <div id="all" class="all col">
    	 <h1>Set the Decimal factor</h1>
            <form method="get" action="">
                <label for="decimal-factor">Put the decimal factor</label>
                <input type="text" name="decimal-factor" id="decimal-factor"/>
                <button name="save-decimal-factor">Save</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>