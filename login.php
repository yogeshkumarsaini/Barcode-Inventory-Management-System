<?php
session_start();
include 'includes/db.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password']))
        {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit();
        }
    }

    $error = "Invalid Login";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">
<div class="col-md-4">

<div class="card">

<div class="card-header">
Login
</div>

<div class="card-body">

<?php if(isset($error)){ ?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php } ?>

<form method="POST">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
type="submit"
name="login"
class="btn btn-primary w-100">
Login
</button>

</form>

</div>
</div>

</div>
</div>

</div>

</body>

</html>