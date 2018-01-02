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
                <li class="active" ><a id="home" href="index.php">Home</a></li>
                <li><a href="#" id="decimal-factor">Set decimal factor</a></li>
            </ul>
        </nav>
        <div style="clear:both;"></div>
        <a href="#" class="import">Enable</a>

    </div>

</div>
<div id="right">
    <div class="content">
        <div id="all" class="all col">

            <h1>Detail of Order <?php echo $fetchedOrder->getId();?></h1>
            <h3> Order Detail</h3>
            <table>
                <tr>
                    <td>total sum: </td>
                    <td><?php echo $fetchedOrder->getTotalSum();?></td>
                </tr>

                <tr>
                    <td>Remaining sum: </td>
                    <td><?php echo $fetchedOrder->getRemainingSum();?></td>
                </tr>

                <tr>
                    <td>Created At: </td>
                    <td><?php echo $fetchedOrder->getCreatedAt();?></td>
                </tr>

                <tr>
                    <td>Decimal Factor : </td>
                    <td><?php echo $currentDecimalFactor;?></td>
                </tr>

                <tr>
                    <td> </td>
                    <td><form action="" method="post"><button name="save-me">save</button></form></td>
                </tr>
            </table>

            <h3> Customer Detail</h3>
            <table>
                <tr>
                    <td>name</td>
                    <td><?php echo $fetchedOrder->getCustomer()->getName();?></td>
                </tr>
                <tr>

                    <td>phone</td>
                    <td><td><?php echo $fetchedOrder->getCustomer()->getPhone();?></td></td>
                </tr>
                <tr>
                    <td>mail</td>
                    <td><td><?php echo $fetchedOrder->getCustomer()->getEmail();?></td></td>
                </tr>
            </table>

            <h3>list of items</h3>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-striped tablevote table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>item Name</th>
                        <th>Count</th>
                        <th>price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach($fetchedOrder->getItems() as $item){
                            ?>
                    <tr>
                        <th scope="row"> <?php echo $item->getId();?></th>
                        <td><?php echo $item->getTitle();?></td>
                        <td><?php echo $item->getCount();?> </td>
                        <td><?php echo $item->getprice();?> </td>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

        </div>
    </div>


</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

    $("#home").click(function(){
        $(".content").load('orders.php');
    });

    $("#decimal-factor").click(function(){
        $(".content").load('decimal-factor.php');
    });



</script>
</body>
</html>