<?php 
include 'db.php'; include 'auth.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Menu List</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Food Name" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button name="add">Add</button>
</form>

<?php
if(isset($_POST['add']))
{
    $conn->query("INSERT INTO menu (name, price, description) VALUES ('$_POST[name]', '$_POST[price]', '$_POST[description]')");
}

$res = $conn->query("SELECT * FROM menu");
while($row = $res->fetch_assoc())
{
    echo "<p>{$row['name']} - {$row['price']} ";
    echo "<a href='edit.php?id={$row['id']}'>Edit</a> ";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a></p>";
}
?>

<a href="dashboard.php">Back</a>
</body>
</html>