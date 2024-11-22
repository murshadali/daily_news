<?php
include 'config.php';  
$article_id = $_GET['id'] ?? null;

if ($article_id) {
    $query = "SELECT * FROM articles WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $article_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $article = mysqli_fetch_assoc($result);

    if (!$article) {
        die("Article not found.");
    }

    mysqli_stmt_close($stmt);
} else {
    die("Invalid article ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="logo">Daily News</div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="world.php">World</a>
            <a href="sports.php">Sports</a>
            <a href="technology.php">Technology</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About</a>
        </nav>
    </header>

    <main>
        <article>
            <h1><?=$article['title'] ?></h1>
            <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="News Image">
            <p><?= nl2br($article['content'] )?></p>
            <p><small>Published on <?= $article['published_at'] ?></small></p>
        </article>
    </main>

    <footer>
        <p>&copy; 2024 Daily News. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
mysqli_close($conn);
?>
