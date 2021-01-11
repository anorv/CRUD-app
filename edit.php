<?php
$id= $_POST['editId'];
$name=$_POST['editName'];
$project=$_POST['editProject'];

if (isset($_POST['editBtn'])) {
    $sql = "UPDATE darbuotojai (id, name) VALUES ('$id', '$name')"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
}


?>