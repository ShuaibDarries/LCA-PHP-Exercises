<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// update.php — Edit an existing employee

require_once 'db_connect.php';

$message = "";
$employee = null;

// Fetch employee data via $_GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT id, name, email, department FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
    $stmt->close();

    if (!$employee) {
        die("Employee not found.");
    }
}

// Handle update via $_POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department = trim($_POST['department'] ?? '');

    // Server-side validation (Stretch Goal)
    if (empty($name) || empty($email)) {
        $message = "<p style='color:red;'>Error: Name and Email are required fields.</p>";
        // Re-fetch employee to keep form populated
        $stmt = $conn->prepare("SELECT id, name, email, department FROM employees WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $employee = $result->fetch_assoc();
        $stmt->close();
    } else {
        $stmt = $conn->prepare("UPDATE employees SET name = ?, email = ?, department = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $department, $id);

        if ($stmt->execute()) {
            header("Location: index.php?msg=updated");
            exit;
        } else {
            $message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1 { color: #1a1a2e; }
        form { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        label { display: block; margin-top: 14px; font-weight: bold; color: #333; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 10px; margin-top: 4px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button {
            margin-top: 20px; padding: 10px 20px; background: #ffc107; color: #212529; border: none; border-radius: 4px; cursor: pointer;
        }
        button:hover { background: #e0a800; }
        .back { display: inline-block; margin-top: 16px; color: #007bff; text-decoration: none; }
        .back:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h1>Edit Employee</h1>

<?php echo $message; ?>

<?php if ($employee): ?>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>

    <label for="department">Department</label>
    <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($employee['department']); ?>" required>

    <button type="submit">Update Employee</button>
</form>
<?php else: ?>
    <p style="color:red;">No employee selected for editing.</p>
<?php endif; ?>

<a href="index.php" class="back">&larr; Back to Employee List</a>

<?php $conn->close(); ?>

</body>
</html>
