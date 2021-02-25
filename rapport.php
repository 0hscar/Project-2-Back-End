<?php session_start(); ?>
<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h2>Rapporten</h2>
    <h3> uppgift 1 - Databasen</h3>
    <p>Denhär uppgiften gjordes på lektionen, så genom att vara närvarande fick vi databasens struktur uppbyggd.</p>
    <img src="../media/databasstrukur.png" class="pic">
    
    <h3> uppgift 2 - Användarhantering</h3>
    <p>Inloggnings och registrerings formsen hade vi lite strul med. Men efter kodtillfället där problemet löste sig så lyckades formulären. Det som fattades var - || $_REQUEST['stage'] == 'login' denhär kodsnutten i if isset linen på index.php.
        Tycker kanske det var lite knepigt att få gjort med tanke på att hela resterande projektet bygger på att man får både inloggningen och registreringen att fungera.
    </p>
    
    <h3> uppgift 3 - Hämta data från databasen</h3>
    <p>Under lektionen gick vi igenom hur man får ut datan från databasen till webbsidan att synnas. Vi lyckades med att lägga restriktioner för annonyma användare genom att använda oss av if isset satser för att checka om man är inloggad så visas hela annons sidan.</p>
    
    <h3> uppgift 4 - Mata in data i databasen</h3>
    <p>Att få data in matat i databasen hade vi strul med men det var rätt småa saker som orsakade problem. Problemet var en del som fattades i if isset satsen i index.php: || $_REQUEST['stage'] == 'register' pluss lite frågetecken och "s,i" som fattades i prepare statement satserna i register.php</p>
    
    <h3> uppgift 5 - Ta bort data från databasen</h3>
    <p>Vi förverkligade denna uppgift med att först skapa en if sats som ckeckar om man är inloggad. Om man är inloggad kommer 2 nya knappar fram en som loggar ut dig från hemsidan, den andra deletar din användare. Så du kan alltså bara deleta användaren om du är inloggad, man behöver alltså inte verifiera med lösenordet utan verifierigen sker då man loggar in.</p>
    
    <h3> uppgift 6 - Ändra information i databasen</h3>
    <p>Vi använde oss ganska långt av registerformen alltså $bio, $real etc... Men istället för insert into så använde vi oss av en UPDATE : $sql = "UPDATE users SET... på dethär viset.</p>

    <h3> uppgift 7 - Sortera och filtrera resultat</h3>
    <p>Vi fick denhär uppgiften förverkligad sådär halft, den filtrerar bara hur mycket man tjänar. Man fick en del gratis bara från att följa med på lektionerna.</p>
    
    <h3> uppgift 8 - Gilla / Ogilla</h3>
    <p>Vi försökte få denhär uppgiften gjord men fick det aldrig att fungera :(</p>
    
    <h3> uppgift 9 - Chatt</h3>
    <p>Vi försökte få denhär uppgiften gjord men fick det aldrig att fungera :(</p>
    
    <h3> uppgift 10 - Reflektion och Feedback</h3>
    <p>Tycker att föreläsningarna varit värda att vara på. Skulle gärna haft ett till kodtillfälle per projekt kanske speciellt för projekt 2. Tycker kanske de delar som var super viktiga att få gjorda lades lite fokus på. t.ex. login och registreringen var läxor även fast hela projektet mer eller mindre bygger på att man får de delarna att fungera. Så kanske hjälpa till lite mera på den fronten och sedan ge andra uppgifter som läxor.</p>
    
    
</article>


<?php include "footer.php" ?>