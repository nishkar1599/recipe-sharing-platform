<?php
// Database connection
$servername = "localhost:3306";
$username = "root"; // Change this to your MySQL username
$password = "Nishkar@1599"; // Change this to your MySQL password
$dbname = "recipe_platform"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = $_POST['title'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];

// Insert data into the database
$sql = "INSERT INTO recipe (title, ingredients, instructions) VALUES ('$title', '$ingredients', '$instructions')";

if ($conn->query($sql) === true) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
