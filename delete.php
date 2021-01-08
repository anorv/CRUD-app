<?php
// delete projekta
if(isset($_GET['action']) and $_GET['action'] == 'deletePrj'){
    $sql = 'DELETE FROM projektai WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();
    
    $stmt->close();
    mysqli_close($conn);
  
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
  }

  // delete darbuotoja
if(isset($_GET['action']) and $_GET['action'] == 'deleteEmp'){
    $sql = 'DELETE FROM darbuotojai WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();
    
    $stmt->close();
    mysqli_close($conn);

    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    die();
}

?>
