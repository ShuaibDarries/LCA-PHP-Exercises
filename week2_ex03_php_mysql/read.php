<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// read.php — Fetch and display all employees

require_once 'db_connect.php';

$sql = "SELECT id, name, email, department, created_at FROM employees ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1 { color: #1a1a2e; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #007bff; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .actions a { color: #007bff; text-decoration: none; margin-right: 10px; }
        .actions a:hover { text-decoration: underline; }
        .add-btn { display: inline-block; margin-bottom: 16px; padding: 10px 18px; background: #28a745; color: #fff; text-decoration: none; border-radius: 4px; }
        .add-btn:hover { background: #218838; }
    </style>
</head>
<body>

<h1>All Employees</h1>
<a href="create.php" class="add-btn">+ Add New Employee</a>

<?php if ($result && $result->num_rows > 0): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['department']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p>No employees found. <a href="create.php">Add the first employee</a>.</p>
<?php endif; ?>

<?php $conn->close(); ?>

</body>
</html>
