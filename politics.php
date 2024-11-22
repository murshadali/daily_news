<?php
include 'config.php';
$query = "SELECT * FROM articles WHERE category = 'politics' ORDER BY published_at DESC";
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
    <title>Politics News</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

    <header>
        <div class="logo">Daily News</div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="world.php">World</a>
            <a href="politics.php" class="active">Politics</a>
            <a href="technology.php">Technology</a>
            <a href="sports.php">Sports</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About Us</a>
        </nav>
    </header>

    
    <main>
        <section class="category-page">
            <h2>Politics News</h2>
            <div class="news-grid">
            <?php foreach ($articles as $article): ?>
                <article>
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="News Image">
                    <h3><?php echo $article['title'];?></h3>
                    <p><?= $article['summary'] ?></p>
                    <a href="article.php?id=<?= $article['id'] ?>">Read More</a>
                </article>
            <?php endforeach; ?>

                <!-- News Article 1
                <article>
                    <img src="https://via.placeholder.com/400x250" alt="Politics News Image 1">
                    <h3>Politics News Title 1</h3>
                    <p>Short description of the politics news content goes here.</p>
                    <a href="article1.html">Read More</a>
                </article>-->

              


            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Daily News. All rights reserved.</p>
    </footer>

</body>
</html>
