<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login']))
{
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $res = $conn->query("SELECT * FROM users WHERE username='$u' AND password='$p'");
    if($res->num_rows > 0)
    {
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
    } 
    else 
    {
        echo "Invalid login";
    }
}
?>
</body>
</html>