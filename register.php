<!-- Registrerings formulär -->
    <!-- <form action="index.php" method="post">
    
        Användarnamn: <br><input type="text" name=" usr"><br>
        Password: <br><input type="password" name="psw"><br>
        Email: <br><input type="email" name="email"><br>
        Zip: <br><input type="text" name="zip"><br>
        Bio: <br><input type="text" name="bio"><br>
        Salary: <br><input type="text" name="cash"><br>
        <label for="pref">Preferens: </label><br>
        <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinnlig</option>
            <option value="other">Annan</option>
            <option value="both">Båda</option>
            <option value="all">Alla</option>
        </select>
        <br><input type="submit" value="Registerar dig"><br>
    </form -->
    
<?php
// include "init.php"
// require_once "init.php"
$link = create_conn();
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
//     //     // Koppla till databasen -->
//         $conn = create_conn(); // HEH - behövs int då vi har include fetch.php
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>




<!-- 
// // Kolla att man klickat submit!
// if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])) {
 //     // Koppla till databasen -->
<!-- //     $conn = create_conn(); // HEH - behövs int då vi har include fetch.php

//     // Hämta data från formuläret
//     $username = test_input($_REQUEST['usr']);
//     $password = test_input($_REQUEST['psw']);
//     $password = hash("sha256", $password);
//     // sup3rHemlis => asd123 - en envägsalgoritm
//     $realname = "asd";
//     $email = test_input($_REQUEST['email']);
//     $zip = test_input($_REQUEST['zip']);
//     $bio = test_input($_REQUEST['bio']);
//     $salary = test_input($_REQUEST['salary']);
//     $preference = test_input($_REQUEST['pref']);

// // TODO: Börja med att check ifall användaren finns i databasen!
// // TODO: Slutför registeringsformuläret    
// // TODO: skapa inloggningsformuläre
// // Prepared statment går snabbare att köra och skyddar mot SQL Injection!
// $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference ) VALUES (?, ?)");
// $statement->bind_param("ss", $username, $realname, $password, $email, $zip, $bio, $salary, $preference); 
// // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
// if ($statement->execute()) {    
//     print("Du har registrerats!");
// }
//  // Kom ihåg error handling - här ska finnas en else sats
// }
?> -->