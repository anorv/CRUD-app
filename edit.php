<?php
// update darbuotoja
$id=0;
$name=$_POST['name'];


if (isset($_POST['submit'])) {
    $sql = "INSERT INTO darbuotojai (id, name) VALUES ('$id', '$name')"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
    print('<tr>
    <td>' . $row["id"] . '</td>
    <td>' . $row["darbuotojai"] . '</td>
    <td>' . $row["projektai"] . '</td>
    <td>
    <a href="?action=deleteEmp&id='  . $row['id'] . '"><button>DELETE</button></a>
    <button class="modalBtn">UPDATE</button>
    </td>
    </tr>');
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
}
