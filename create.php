<?php
// create darbuotoja
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
// create projektai

$project = $_POST['project'];

if (isset($_POST['submitPrj'])) {
    $sql = "INSERT INTO projektai (id, project) VALUES ('$id', '$project')"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
    print('<tr>
    <td>' . $row["id"] . '</td>
    <td>' . $row["project"] . '</td>
    <td>' . $row["name"] . '</td>
    <td>
    <a href="?action=deletePrj&id='  . $row['id'] . '"><button>DELETE</button></a>
    <a href="?action=editPrj&id='  . $row['id'] . '"><button>UPDATE</button></a>
    </td>
    </tr>');
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
}
?>

