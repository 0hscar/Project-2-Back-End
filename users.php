<?php session_start(); ?>
<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Bläddra bland kontaktannonserna</h1>
    <p>Använd gärna filtrerings och sorteringsformuläret: </p>
    <p>
        <!-- Filtreringsformulär -->
    <form action="users.php" method="get">
        <!-- Radio buttons för sortering -->
        <label for="rich">Rika först</label>
        <input type="radio" name="salary" value="rich" checked>
        <label for="poor">Rika sist</label>
        <input type="radio" name="salary" value="poor"><br>

        <label for="pop">Populära först</label>
        <input type="radio" name="likes" value="pop" checked>
        <label for="notpop">Populära sist</label>
        <input type="radio" name="likes" value="notpop">
    
        <!-- Dropdown för preferens -->
        <label for="pref">Preferens</label><br>
        <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinnlig</option>
            <option value="other">Annan</option>
            <option value="both">Båda</option>
            <option value="all">Alla</option>
        </select>
        <input type="submit" value="Filtrera">
    </form>
    </p>

    <?php 
    if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) {
        echo "Welcome ". $_SESSION['user']."!";
        include "fetch.php";
    }
    
    else {
        echo "Please Log in first!";
    }
            
    ?>


</article>

<?php include "footer.php" ?>