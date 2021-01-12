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
 
    $sql = "SELECT * FROM darbuotojai 
    WHERE id='$id'";
 
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query); 
 
        if (isset($_POST['editBtn'])) {

            $name = $_POST['darbuotojai'];
            $projects = $_POST['project_id'];
 
            $edit = mysqli_query($conn, "UPDATE darbuotojai 
             SET name ='$name', project_id='$projects' 
             WHERE id='$id'");
 
            header("Location: index.php");
            die();
        }
    }
 
?>
 <h3> Redaguoti darbuotojo vardą ir priskirti naują projektą:</h3>
 <form class="form" action="" method="POST" id="create">
    <input type="text" name="darbuotojai" value="<?php echo $row['name'] ?>">
    <select id="project_id" name="project_id">
        <?php
        $sql = "SELECT projektai.id, projektai.project 
         FROM projektai";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['project']; ?></option>
            <?php
                }
            } ?>
    </select>
    <input  class="btn edit" type="submit" name="editBtn" value="EDIT">
 </form>
</body>
</html>
