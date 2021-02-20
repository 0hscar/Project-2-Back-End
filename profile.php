<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Profilsidan</h1>
    <?php
    // Här hämtar vi användarens data
    // print($_SESSION['user']);
    if(isset($_SESSION['user'])){
    $conn = create_conn(); // MySql objeketet skapas
    $user = $_SESSION['user']; // Kolla vem som är inloggad
    $sql = "SELECT * FROM users WHERE username = ?"; // ? placeholder för data

    $stmt = $conn->prepare($sql); // prepare returnerar MySqli_stmt objektet
    $stmt->bind_param("s",$user); // skicka nu först användarinmatad data i sql
    $stmt->execute(); // returnerar true eller false (lyckas köras på DBn eller ej)

    $result = $stmt->get_result(); // Returnerar data i ett form av MySqliresult objekt
    $row = $result->fetch_assoc(); // Ta ut datan från MySqli_result objektet till en associative array (assArr)
    print("<form action='profile.php' method='get'");
    print("Riktiga namnet: <input type='text' value='" . $row['realname']."'>");
    print("Annonstext: <textarea>" . $row['bio'] ."</textarea></p>");
    print("<input type='submit' value='Uppdatera'");
    print("</form>");
    // TODO: Skriv ut tidigare kommentarer på ens profil
    }
    else {
        print("Du försöker se på nån annans profil");
    }
    ?>

</article>

<?php include "footer.php" ?>