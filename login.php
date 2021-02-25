<?php 
    session_start();
?>

<!-- Login formulär -->
<form action="index.php" method="post">
    Användarnamn <br><input type="text" name=" usr"><br>
    Lösenord <br><input type="password" name="psw"><br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
    
</form>
<?php
    
    $usr = $_POST['usr'];
    $psw = $_POST['psw'];
    
    $hashed_password = hash("sha256", $psw);
    
    $mysql = create_conn();
    $query ="SELECT username, password FROM users WHERE username = '".$usr."' AND  password = '".$hashed_password."'";
    $result = $mysql->query($query);
        
    // if(password_verify($psw, $hashed_password)){
        if($result->num_rows > 0) {
        // session_start();
        $_SESSION['user'] = $result->fetch_assoc();
        // do something like send to dashboard or whatever
        $_SESSION['LoggedIn'] = true;
        header("refresh:2;url=./profile.php");
        header("location: ./profile.php"); //Redirect user on login
        }           
        else{
        // no match for username and/or password
        print ("<p> Please enter password and username");
        }
    // }
        
    
?>





