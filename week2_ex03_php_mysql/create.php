<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// create.php — Add a new employee

require_once 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department = trim($_POST['department'] ?? '');

    // Server-side validation (Stretch Goal)
    if (empty($name) || empty($email)) {
        $message = "<p style='color:red;'>Error: Name and Email are required fields.</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO employees (name, email, department) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $department);

        if ($stmt->execute()) {
            header("Location: index.php?msg=created");
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
    <title>Add New Employee</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1 { color: #1a1a2e; }
        form { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        label { display: block; margin-top: 14px; font-weight: bold; color: #333; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 10px; margin-top: 4px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button {
            margin-top: 20px; padding: 10px 20px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;
        }
        button:hover { background: #0056b3; }
        .back { display: inline-block; margin-top: 16px; color: #007bff; text-decoration: none; }
        .back:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h1>Add New Employee</h1>

<?php echo $message; ?>

<form method="POST" action="create.php">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" required>

    <label for="department">Department</label>
    <input type="text" id="department" name="department" required>

    <button type="submit">Add Employee</button>
</form>

<a href="index.php" class="back">&larr; Back to Employee List</a>

</body>
</html>
