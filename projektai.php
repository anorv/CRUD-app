
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$crud= "crud";

// Sukuriame rysi su MySQL
$conn = mysqli_connect($servername, $username, $password, $crud);
// PASITIKRINIMUI ar uzsimezge koneksinas per terminala irasant - php .\index.php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
 require_once 'delete.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
<div>
  <a href='index.php'>Darbuotojai</a>
  <a href='projektai.php'>Projektai</a>
  <h3> Projektų valdymas</h3>
</div>
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Projektai</th>
      <th scope="col">Darbuotojai</th>
      <th scope="col">Veiksmas</th>
    </tr>
  </thead>
  <tbody>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $crud= "crud";

// // Sukuriame rysi su MySQL
// $conn = mysqli_connect($servername, $username, $password, $crud);
// // PASITIKRINIMUI ar uzsimezge koneksinas per terminala irasant - php .\index.php
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$sql = "SELECT projektai.id as id, 
projektai.project as project,
group_concat(darbuotojai.name) as name
FROM darbuotojai
right JOIN projektai
ON darbuotojai.project_id = projektai.id
group by projektai.id";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Atspausdina viska html
        print('<tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["project"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>
        <a href="?action=deletePrj&id='  . $row['id'] . '"><button>DELETE</button></a>
        <a href="?action=updatePrj&id='  . $row['id'] . '"><button>UPDATE</button></a>
        </td>
        </tr>');
        
    }
} else {
    echo "0 results";
}
// // delete projekta
// if(isset($_GET['action']) and $_GET['action'] == 'deletePrj'){
//   $sql = 'DELETE FROM projektai WHERE id = ?';
//   $stmt = $conn->prepare($sql);
//   $stmt->bind_param('i', $_GET['id']);
//   $res = $stmt->execute();
  
//   $stmt->close();
//   mysqli_close($conn);

//   header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
//   die();
// }
// Visada turime baigia darba isjungti konection
mysqli_close($conn);

?>
</tbody>
</table>
<!-- ideti nauja projkta -->
<form  class="newFolder" action="" method="POST" id="create">
    <input type="text" name="addProject">
    <input type="submit" value="ADD Projektas" name ="submit">
 </form>
</form>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html> 