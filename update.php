<?php
session_start();

include_once 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update user details
    $sqlUpdate = "UPDATE users SET emri = :emri, username = :username, email = :email WHERE id = :user_id";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':emri', $emri);
    $stmtUpdate->bindParam(':username', $username);
    $stmtUpdate->bindParam(':email', $email);
    $stmtUpdate->bindParam(':user_id', $user_id);
    $stmtUpdate->execute();

    $_SESSION['emri'] = $emri;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body>

<?php include_once 'header.php'; ?>

<div class="container mt-5">
    <h2>Update Profile</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="emri" class="form-label">Name</label>
            <input type="text" class="form-control" id="emri" name="emri" value="<?php echo $user['emri']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
     
    </form>


<?php include_once 'footer.php'; ?>
</body>
</html>
