<?php session_start(); ?>
<?php
//om man har sortrerat/ filtrerar
if(isset($_REQUEST['salary'])){
    print("filtrerar...");
    // Skapa SQL kommando
    $sql ="SELECT * FROM users ORDER BY salary DESC";
    fetchAndWrite($sql);
} 

// om man inte tryckt på filtrera
else if(!isset($_REQUEST['salary'])) {
    // Skapa SQL kommando
    $sql ="SELECT * FROM users";
    fetchAndWrite($sql);
}


function fetchAndWrite($sql) {
    // Skapa databasuppkoppling
    $conn = create_conn();
    // kör SQL kommando på databasen
    if ($result = $conn->query($sql)){
        //skapa en wile loop för att hämta varje rad!
            while($row = $result->fetch_assoc()) {
            // Skriv ut endaste ett värde (en kolumn en rad -- en cell)
            print("<p class='ad'>");
            print("Användare i database: " . $row['username'] . "<br>");
            print("Lön: " . $row['salary'] . "</br>");
            $prefArr = ['Manlig', 'Kvinnlig', 'Annan', 'Båda', 'Alla'];
            print("Prefernse: " . $row['preference'] ."</br>");
            print("<a href='./profile.php?user=".$row['username']."'>Kommentera!</a></p>");
        }
    }   else {
        print("något gick fel, senaste felet: " . $conn->error);
    }
}