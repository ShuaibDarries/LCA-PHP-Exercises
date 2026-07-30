<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// delete.php — Delete an employee record

require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=deleted");
        exit;
    } else {
        echo "<p style='color:red;'>Error deleting record: " . $stmt->error . "</p>";
        echo "<a href='index.php'>Back to Employee List</a>";
    }

    $stmt->close();
} else {
    header("Location: index.php");
    exit;
}

$conn->close();
?>
