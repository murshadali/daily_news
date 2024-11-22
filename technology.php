<?php

include 'config.php';
$query = "SELECT * FROM articles WHERE category = 'technology' ORDER BY published_at DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));
}

$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="logo">Daily News</div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="world.php">World</a>
            <a href="politics.php">Politics</a>
            <a href="technology.php" class="active">Technology</a>
            <a href="sports.php">Sports</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About Us</a>
        </nav>
    </header>

    <main>
        <section class="category-page">
            <h2>Technology News</h2>
            <div class="news-grid">
            <?php foreach ($articles as $article): ?>
                <article>
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="News Image">
                    <h3><?php echo $article['title'];?></h3>
                    <p><?= $article['summary'] ?></p>
                    <a href="article.php?id=<?= $article['id'] ?>">Read More</a>
                </article>
            <?php endforeach; ?>

            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Daily News. All rights reserved.</p>
    </footer>

</body>
</html>
