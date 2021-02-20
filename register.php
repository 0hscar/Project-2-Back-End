<!-- Login formulär -->
    <form action="index.php" method="post">
        Användarnamn <br><input type="text" name=" usr"><br>
        Email <br><input type="password" name="psw"><br>
        <input type="submit" value="Registerar dig">
    </form
<?php
// Kolla att man klickat submit!
if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])) {
    // Koppla till databasen
    $conn = create_conn(); // HEH - behövs int då vi har include fetch.php

    // Hämta data från formuläret
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    // sup3rHemlis => asd123 - en envägsalgoritm
    $realname = "asd";
    $email = "aasd";
    $zip = 68600;
    $bio ="snäll";
    $salary = 12;
    $preference = 2;



// TODO: Börja med att check ifall användaren finns i databasen!
// TODO: Slutför registeringsformuläret    
// TODO: skapa inloggningsformuläre
// Prepared statment går snabbare att köra och skyddar mot SQL Injection!
$statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference ) VALUES (?, ?)");
$statement->bind_param("ss", $username, $realname, $password, $email, $zip, $bio, $salary, $preference); 
// De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
if ($statement->execute()) {    
    print("Du har registrerats!");
}
// Kom ihåg error handling - här ska finnas en else sats
}