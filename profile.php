
<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Profilsidan</h1>
    <input type="submit" name="deleteUser" value="Delete User"/>
<?php
// Här hämtar vi användarens data
// print($_SESSION['user']);
    
// if(isset($_POST['deleteUser']))  {
//     deleteUser();
// }
    
// if(isset($_SESSION['user'])){
if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) {

// if($_SESSION['LoggedIn'] == true)){
    $conn = create_conn(); // MySql objeketet skapas
    $user = $_SESSION['user']['username']; // Kolla vem som är inloggad
    $sql = "SELECT * FROM users WHERE username = ?"; // ? placeholder för data
        
    $stmt = $conn->prepare($sql); // prepare returnerar MySqli_stmt objektet
    $stmt->bind_param("s",$user); // skicka nu först användarinmatad data i sql
    $stmt->execute(); // returnerar true eller false (lyckas köras på DBn eller ej)

    $result = $stmt->get_result(); // Returnerar data i ett form av MySqliresult objekt
    $row = $result->fetch_assoc(); // Ta ut datan från MySqli_result objektet till en associative array (assArr)
    print("<form action='profile.php' method='get'>");
    print("Riktiga namnet: <br><input type='text' name='real' value='" . $row['realname']."'>");
    print("<br>Annonstext: <br><textarea>" . $row['bio'] ."</textarea></p>");
    print("</form>");
        
        
    print("<p> Make changes here (You need to fill them all, even if you dont change them:</p>");
    print("<form action='profile.php' method='post'>");
    print("Riktigt namn: <br><input type='text' name ='real'><br>");
    print("Zip: <br><input type='text' name='zip'><br>");
    print("Bio: <br><input type='text' name='bio'><br>");
    print("Salary: <br><input type='number' name='salary'><br>");
    print("<br/> <input type='submit' name='update' value='Uppdatera'>");
    print("</form>");
}
else {
    print("Du försöker se på nån annans profil");
}
$realname = $_POST['real'];
$zip = $_POST['zip'];
$bio = $_POST['bio'];
$salary = $_POST['salary'];

if(isset($_POST['update'])){
    var_dump($realname);
    
    $sql = "UPDATE users SET realname= '". $realname."', zipcode = '". $zip ."', bio= '". $bio ."', salary= '". $salary ."' WHERE username='". $_SESSION['user']['username']."'";
    if($conn->query($sql) === TRUE){
        echo "Updated";
    }   
    else{
        echo "Failed";
    }
}



    
?>

</article>

<?php include "footer.php" ?>