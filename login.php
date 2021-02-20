<!-- Login formulär -->
<form action="index.php" method="post">
    Användarnamn <br><input type="text" name=" usr"><br>
    Lösenord <br><input type="password" name="psw"><br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>
<?php
    if(isset($_REQUEST['stage']) && $_REQUEST['stage'] == 'login') {
        print("loggar in om 2 sekunder...");
        $_SESSION['user'] = "Joel";
        header("refresh:2;url=./profile.php");
        //header("location: ./profile.php); Redirect user on login
    }
?>