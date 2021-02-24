<!--Registrerings formulär -->
    <form action="index.php" method="post">
        Användarnamn: <br><input type="text" name="usr"><br>
        Riktigt namn: <br><input type="text" name ="real"><br>
        Password: <br><input type="password" name="psw"><br>
        Email: <br><input type="email" name="email"><br>
        Zip: <br><input type="text" name="zip"><br>
        Bio: <br><input type="text" name="bio"><br>
        Salary: <br><input type="number" name="salary"><br>
        <label for="pref">Preferens: </label><br>
        <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinnlig</option>
            <option value="other">Annan</option>
            <option value="both">Båda</option>
            <option value="all">Alla</option>
        </select>
        <br><input type="submit" value="Registerar dig"><br>
        <input type="hidden" name="stage" value="register">
    </form>
    
 
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

</head>
<body> -->

<?php
    // Kolla att man klickat submit!
 if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])) {
//   Koppla till databasen 
     $conn = create_conn(); // HEH - behövs int då vi har include fetch.php

    // Hämta data från formuläret
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    // sup3rHemlis => asd123 - en envägsalgoritm
    $realname = test_input($_REQUEST['real']);
    $email = test_input($_REQUEST['email']);
    $zip = test_input($_REQUEST['zip']);
    $bio = test_input($_REQUEST['bio']);
    $salary = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['pref']);

// TODO: Börja med att check ifall användaren finns i databasen!
// TODO: Slutför registeringsformuläret    
// TODO: skapa inloggningsformuläre
// Prepared statment går snabbare att köra och skyddar mot SQL Injection!
$statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$statement->bind_param("ssssssii", $username, $realname, $password, $email, $zip, $bio, $salary, $preference); 
// De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
if ($statement->execute()) {    
     print("Du har registrerats!"); 
     }
//   Kom ihåg error handling - här ska finnas en else sats
 }
?>

<!-- </body>
</html> -->
