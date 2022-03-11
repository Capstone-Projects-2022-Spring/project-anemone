<!--<?php session_start();
    if (empty($_SESSION['id'])) :
        header('Location:login.php');
    endif;
    ?>
<!DOCTYPE html>
<html>
<body>
    <div style="width:150px;margin:auto;height:500px;margin-top:300px">

    <?php
    //need to include
    // include('database connection.php');
    session_destroy();

    echo '<meta http-equiv="refresh" content="2;url=login.blade.php">';
    echo '<progress max=200><strong>Progress: 60% Done.</strong></progress><br>';
    echo '<span class="itext">Logging out of Anemone...</span>';

    ?>
    </div>

</body>
</html>-->