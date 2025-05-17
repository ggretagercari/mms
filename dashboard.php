<?php
session_start();

include_once "config.php";

// Check if the user is logged in
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body>

<?php include_once 'header.php'; ?>

<div class="container mt-5">
    <h2>Welcome, <?php echo $user['emri']; ?>!</h2>

    <h3>Your Bookings</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
           <th>name</th>
           <th>username</th>
           <th>email</th>
           <th>password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlBookings = "SELECT * FROM bookings WHERE user_id = :user_id";
            $stmtBookings = $conn->prepare($sqlBookings);
            $stmtBookings->bindParam(':user_id', $user_id);
            $stmtBookings->execute();
            $bookings = $stmtBookings->fetchAll();

 
            
            ?>
        </tbody>
    </table>

    <h3>Available Movies</h3>
    <table class="table">
   
        <tbody>
            <?php
            foreach ($movies as $movie) {
                echo "<tr>
                    <td>{$id['id']}</td>
                    <td>{$name['name']}</td>
                    <td>{$username['username']}</td>
                    <td>{$password['password']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once 'footer.php'; ?>
</body>
</html>
