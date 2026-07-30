<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// index.php — Landing page: list all employees with Add, Edit, Delete links

require_once 'db_connect.php';

// Handle search filter (Stretch Goal)
$search = trim($_GET['search'] ?? '');
if (!empty($search)) {
    $stmt = $conn->prepare("SELECT id, name, email, department, created_at FROM employees WHERE department LIKE ? ORDER BY id DESC");
    $like = "%$search%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT id, name, email, department, created_at FROM employees ORDER BY id DESC");
}

// Success messages
$msg = $_GET['msg'] ?? '';
$alert = '';
if ($msg === 'created') $alert = '<p style="color:green; font-weight:bold;">Employee added successfully!</p>';
if ($msg === 'updated') $alert = '<p style="color:green; font-weight:bold;">Employee updated successfully!</p>';
if ($msg === 'deleted') $alert = '<p style="color:green; font-weight:bold;">Employee deleted successfully!</p>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVibe Employee Management</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1000px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1 { color: #1a1a2e; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 16px; }
        .add-btn { padding: 10px 18px; background: #28a745; color: #fff; text-decoration: none; border-radius: 4px; }
        .add-btn:hover { background: #218838; }
        .search-form { display: flex; gap: 8px; }
        .search-form input { padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; }
        .search-form button { padding: 8px 14px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #007bff; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .actions a { color: #007bff; text-decoration: none; margin-right: 10px; }
        .actions a:hover { text-decoration: underline; }
        .actions .delete { color: #dc3545; }
        .actions .delete:hover { color: #a71d2a; }
        .empty { padding: 30px; text-align: center; color: #666; }
    </style>
</head>
<body>

<h1>TechVibe Employee Management</h1>

<?php echo $alert; ?>

<div class="top-bar">
    <a href="create.php" class="add-btn">+ Add New Employee</a>
    <form class="search-form" method="GET" action="index.php">
        <input type="text" name="search" placeholder="Filter by department..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <?php if (!empty($search)): ?>
            <a href="index.php" style="padding:8px 12px; color:#666; text-decoration:none;">Clear</a>
        <?php endif; ?>
    </form>
</div>

<?php if ($result && $result->num_rows > 0): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Created At</th>
            <th>Actions</th>
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
            <td class="actions">
                <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <div class="empty">
        <p>No employees found.</p>
        <?php if (!empty($search)): ?>
            <p><a href="index.php">View all employees</a> or <a href="create.php">add a new one</a>.</p>
        <?php else: ?>
            <p><a href="create.php">Add the first employee</a>.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php $conn->close(); ?>

</body>
</html>
