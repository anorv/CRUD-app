<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$crud = "crud";
 
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
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>
 
<body>
 
    <?php
 
    if (isset($_GET['id']) && intval($_GET['id'])) {
        $id = (int) $_GET['id'];
 
        $sql = "SELECT * FROM projektai 
        WHERE id='$id'";
 
        $query = mysqli_query($conn, $sql); // select query
 
        $row = mysqli_fetch_array($query); // fetch data
 
        if (isset($_POST['editBtnP'])) {
 
            $projects = $_POST['project'];
 
            $edit = mysqli_query($conn, "UPDATE projektai 
            SET project ='$projects' WHERE id='$id'");
 
            header("Location: projektai.php");
            die();
        }
    }
 
    ?>
    <h3>Redaguoti projekto pavadinimą:</h3>
    <form class="form" action="" method="POST" id="create">
        <input type="text" name="project" value="<?php echo $row['project'] ?>">
        </select>
        <input class="btn edit" type="submit" name="editBtnP" value="EDIT">
    </form>
</body>
</html>
