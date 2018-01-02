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
<div id="left">
    <div class="menu" >
            <img src="image/logo.png">
               <nav class="">
                     <ul>
                        <li class="active" ><a id="home" href="#">Home</a></li>
                        <li><a href="#decimal-factor" id="decimal-factor">Set decimal factor</a></li>
                    </ul>
                </nav>
                <div style="clear:both;"></div>
                <a href="#" class="import">Enable</a>
                
              </div>

</div>
<div id="right">
     <div class="content">
     	
     </div>


</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(".content").load('orders.php');
	
	$("#home").click(function(){
    	$(".content").load('orders.php');
    });

    $("#decimal-factor").click(function(){
    	$(".content").load('decimal-factor.php');
    });

    

</script>
</body>
</html>