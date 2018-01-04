<div id="left">
    <div class="menu">

        <img src="image/logo.png">
        <nav class="">
            <ul>
                <li class="active" ><a id="home" href="index.php">Home</a></li>
                <li><a href="decimal-factor.php" id="decimal-factor">Set decimal factor</a></li>
            </ul>
        </nav>
        <div style="clear:both;"></div>
        <form method="post" action="connect.php"/>
        <?php if ($currentEnableFuncs == 1){?>
        <button class="import" value="0" name="enable-funcs">Disable module</button>
        <?php
        }else {?>
        <button class="import" value="1" name="enable-funcs">Enable module</button>
        <?php } ?>
    </div>
</div>

<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        if (<?php echo $currentEnableFuncs?> == 0){
            $( "#right").hide();
        }
    });
</script>