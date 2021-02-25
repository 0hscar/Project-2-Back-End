
<nav>
    <!-- Logo och meny finns i nav -->
    <ul>
        <li><a href="./index.php">Hem</a></li>
        <li><a href="./users.php">Annonser</a></li>
        <li><a href="./profile.php">Profile</a></li>
        <li><a href="./rapport.php">Rapport</a></li>
        
    </ul>
    <form action="index.php" method="post">
        <!-- <input type="submit" name="logOut" value="Logout" />
        <input type="submit" name="deleteUser" value="Delete User"/> -->
    </form>

</nav>

<?php

if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) {
    print('<form action="index.php" method="post">');
    print('<input type="submit" name="logOut" value="Logout" />');
    print('<input type="submit" name="deleteUser" value="Delete User"/>');
    print('</form>');
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logOut'])){
    logOut();
}
if(isset($_POST['deleteUser']))  {
    deleteUser();
}


function logOut(){
    unset($_SESSION['username']);
    $_SESSION['LoggedIn'] = false;
}

function deleteUser(){
    $link = create_conn();
    if ($link -> connection_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM users WHERE username = '". $_SESSION['user']['username']."'"; 
    // var_dump($link);
    if($link->query($sql) == true){
        $_SESSION['LoggedIn'] = false;
    }
    else   {
        echo "failed";
    }  
}


    

// var_dump($_SESSION['user']['username']);
    

   
?>