<?php
session_start();

// Remove whitespaces, remove extra slashes, and convert to safe html characters
// USE FOR ALL USER INPUT
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Sets up connection to database - use $conn = create_conn(); to open connection and $conn->close();
function create_conn()
{
    //Databaskonfiguration
    $servername = "localhost";
    $username = "hellstjo";
    $password = "q9LwXZhyn6";
    $dbname = "hellstjo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // FIXA UTF8 - encoding
    $conn->set_charset("utf8");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}
$conn - create_conn();