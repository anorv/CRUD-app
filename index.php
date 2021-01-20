
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

 require_once 'delete.php'; 
 require_once 'create.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Darbuotojai</title>
</head>
<body>
<div>
  <a  class="text" href='index.php'>Darbuotojai</a>
  <a class="text" href='projektai.php'>Projektai</a>
  <h3> Projektų valdymas</h3>
</div>

<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Darbuotojas</th>
      <th scope="col">Projektas</th>
      <th scope="col">Veiksmas</th>
    </tr>
  </thead>
  <tbody>
 <?php
// Print table
$sql = "SELECT darbuotojai.id as id, darbuotojai.name as darbuotojai, projektai.id as project_id, projektai.project as projektai 
FROM crud.darbuotojai
LEFT JOIN projektai
ON darbuotojai.project_id = projektai.id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Print to HTML
        print('<tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["darbuotojai"] . '</td>
        <td>' . $row["projektai"] . '</td>
        <td>
        <a href="?action=deleteEmp&id='  . $row['id'] . '"><button class="btn">DELETE</button></a>
        <a href="edit.php?id='  . $row['id'] . '"><button class="btn">UPDATE</button></a>
        </td>
        </tr>');
    

    }

}else {
    echo "0 results";
}
mysqli_close($conn);
?>
</tbody>
</table>
<!-- Update button -->
<form  action="" method="POST" id="create">
  <input type="text" name="name" for="name">
  <input class="btn"  type="submit" value="ADD Project" name ="submit">
</form>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>