<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$crud= "crud";

// Connect MySQL
$conn = mysqli_connect($servername, $username, $password, $crud);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  class="modal_form" action="" method="POST" id="create">
              <input type="text" name="darbuotojai" value="<?php $name?>">
              <select id="project" name="editProject">
            <option value="<?php $row["projektai"] ?>"><?php $row["projektai"] ?></option>
              </select>
              <input type="submit" name ="editBtn" value="Edit">
             </form>
<?php

if (isset($_GET['id']) && intval($_GET['id'])) {
    $id = (int) $_GET['id']; 

    $sql = "SELECT * FROM darbuotojai 
    WHERE id='$id'";

    $query = mysqli_query($conn, $sql); // select query

    $row = mysqli_fetch_array($query); // fetch data

if(isset($_GET['action']) and $_GET['action'] == 'editBtn'){

    $name = $_POST['darbuotojai'];
    $projects = $_POST['project_id'];
    
$edit = mysqli_query($conn,"UPDATE darbuotojai 
SET name ='$name', project_id='$projects' 
WHERE id='$id'");


header("Location: index.php");
die();
}}

?>

</body>
</html>
