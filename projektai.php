<?php
$servername = "localhost";
$username = "root";
$password = "mysql";


// Sukuriame rysi su MySQL
$conn = mysqli_connect($servername, $username, $password, $crud);
// PASITIKRINIMUI ar uzsimezge koneksinas per terminala irasant - php .\index.php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
print("<div>
<a href='darbuotojai.php'>Darbuotojai</a>
<a href='projektai.php'>Projektai</a>
<h3> Projektų valdymas</h3>");
print("<table>");
print("<tr><th>ID</th><th>Projektai</th><th>Darbuotojas</th></tr>");
$sql = "SELECT id, Projektas, Darbuotojas FROM crud.projektai";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Atspausdina viska html
        print('<tr><td>' . $row["id"] . '</td><td>' . $row["Projektas"] . '</td><td>'. $row["Darbuotojas"] .'</td></tr>');
    }
} else {
    echo "0 results";
}
print("</table>");
// Visada turime baigia darba isjungti konection
mysqli_close($conn);
?>