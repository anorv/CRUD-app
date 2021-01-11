<?php
// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $crud= "crud";

// // Connect MySQL
// $conn = mysqli_connect($servername, $username, $password, $crud);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());

// }
if (isset($_GET['id']) && intval($_GET['id'])) {
    $id = (int) $_GET['id']; 

    $sql = "SELECT * FROM darbuotojai 
    WHERE id='$id'";

    $query = mysqli_query($conn, $sql); // select query

    $row = mysqli_fetch_array($query); // fetch data

if(isset($_GET['action']) and $_GET['action'] == 'editEmp'){

    $name = $_POST['darbuotojai'];
    $projects = $_POST['project_id'];
    
$edit = mysqli_query($conn,"UPDATE darbuotojai 
SETname='$name', project_id='$projects' 
WHERE id='$id'");


header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
die();
}}

?>