<?php 
include 'db.php'; include 'auth.php';
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM menu WHERE id=$id");
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Item</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>">
    <textarea name="description"><?php echo $row['description']; ?></textarea>
    <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update']))
{
    $conn->query("UPDATE menu SET name='$_POST[name]', price='$_POST[price]', description='$_POST[description]' WHERE id=$id");
    header("Location: menu.php");
}
?>
</body>
</html>