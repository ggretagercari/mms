<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Fetch the movie details
    $sql = "SELECT * FROM users WHERE id =:user ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam($user_id);
    $stmt->execute();
    $movie = $stmt->fetch();

    
  
        $stmtUpdate->execute();

        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body>

<?php include_once 'header.php'; ?>

<div class="container mt-5">
    <h2>Action</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="user" name="name" value="<?php echo $movie['movie_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="user" name="username" value="<?php echo $movie['movie_desc']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="user" name="email" value="<?php echo $movie['movie_quality']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="user" name="password" value="<?php echo $movie['movie_rating']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="repate_your_password" class="form-label">Repate your Password</label>
            <input type="text" class="form-control" id="user" name="repate_your_password" value="<?php echo $movie['movie_image']; ?>" required>
        </div>
    
    </form>


<?php include_once 'footer.php'; ?>
</body>
</html>
