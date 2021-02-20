<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h2>Logga in</h2>
    <p>Var god logga in eller registrera dig!</p>
    <a href="index.php?stage=signin"><input type="button" value="Logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="Registrera dig"></a>

     <?php 
     // Om ni inte lyckas - gör såhär tillvidare
     $_SESSION['user'] = "dennis";

     // Om man klickat på register knappen är stage set - includea register.php
     if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup') ){
        include "register.php";
     }
     // TODO: Om man klickat på login knappen - includea register.php
    else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login' ) ){
        include "login.php";
    }
     ?>


</article>


<?php include "footer.php" ?>