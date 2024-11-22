<?php
include 'config.php';
$query = "SELECT * FROM articles ORDER BY published_at DESC LIMIT 8";
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
    <title>News Website</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #latest-news{
            text-decoration: none;
            color:red;
        }
        .current-news-content {
            width: auto;
            height: 30vh;
            text-align: center;
            margin: 0;
        }
        .current-news-content p{
            color:blueviolet;
        }
        .data-item {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.5s forwards ease-in-out;
        }

        @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Daily News</div>
        <nav class="navbar">
            <a href="index.php" class="active">Home</a>
            <a href="world.php">World</a>
            <a href="politics.php">Politics</a>
            <a href="technology.php">Technology</a>
            <a href="sports.php">Sports</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About Us</a>
        </nav>
    </header>

    <section class="current_news">
        <div class="current-news-content" id="current_news_div" style="text-align: center;">
            <h2 id="heading"><?php echo $articles[0]['title']?></h2>
            <p id="summary"><?php echo $articles[0]['summary']; echo $articles[0]['id']?></p>
            <!-- <button class="current_button"><a href="article.php?id=<?= $articles[0]['id'] ?>" id="latest-news">Read More</a></button> -->
        </div>
    </section>

    <main>
        <section class="news-categories">
            <h2>Latest News</h2>
            <div class="news-grid">
                <article>
                    <img src="<?= htmlspecialchars($articles[0]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[0]['title'];?></h3>
                    <p><?= $articles[0]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[0]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[1]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[1]['title'];?></h3>
                    <p><?= $articles[1]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[1]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[2]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[2]['title'];?></h3>
                    <p><?= $articles[2]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[2]['id'] ?>">Read More</a>
                </article>
                 <article>
                    <img src="<?= htmlspecialchars($articles[3]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[3]['title'];?></h3>
                    <p><?= $articles[3]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[3]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[4]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[4]['title'];?></h3>
                    <p><?= $articles[4]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[4]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[5]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[5]['title'];?></h3>
                    <p><?= $articles[5]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[5]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[6]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[6]['title'];?></h3>
                    <p><?= $articles[6]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[6]['id'] ?>">Read More</a>
                </article>
                <article>
                    <img src="<?= htmlspecialchars($articles[7]['image_url']) ?>" alt="News Image">
                    <h3><?php echo $articles[7]['title'];?></h3>
                    <p><?= $articles[7]['summary'] ?></p>
                    <a href="article.php?id=<?= $articles[7]['id'] ?>">Read More</a>
                </article>
            </div>
        </section>
    
    </main>
    <footer>
        <a href="admin_panel.php">Login as Admin</a><br>
        <a href="contact.html">Contact Us</a>
        <p>&copy; 2024 Daily News. All rights reserved.</p>
    </footer>
    <script src="index.js"></script>
</body> 
</html>
