<?php
include 'config.php';
session_start();
if(!(isset($_SESSION['username']) && isset($_SESSION['password'])))
{
    header("location:admin_verify.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $category = $_POST['category'];
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $image = $_FILES['image'];
    $directory = 'images/';
    $image_url = $directory.$image['name'];
    if(!move_uploaded_file($image['tmp_name'],$image_url)){
        die('image is not recognized');
    }

    $query = "INSERT INTO articles (category, title, summary, content, image_url) VALUES ('$category', '$title', '$summary', '$content', '$image_url')";
    $result = mysqli_query($conn,$query);
    if(!$result)
    {
        die("Article added successfully!");
    }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background-color: powderblue;
        }
        h2{
            text-align: center;
        }
        label{
            display: block;
        }
        form{
            text-align:center;
        }
        #category{
           width: 100vh;
           height: 25px;
        }

        #image {
            border: 1px solid #000;
            width: 100vh;
        }
        #title{
            width:100vh;
            height: 10vh;
        }
        #summary{
            width:100vh;
            height: 20vh;
        }
        #content{
            width:100vh;
            height: 30vh;
        }

    </style>
</head>
<body>

    <header>
        <div class="logo">Admin Panel</div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="world.php">World</a>
            <a href="politics.php">Politics</a>
            <a href="technology.php">Technology</a>
            <a href="sports.php">Sports</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About Us</a>
        </nav>
    </header>

    <main>
        <h2>Add New Article</h2>
        <form action="add_article.php" method="post" enctype="multipart/form-data">
        <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="select">select</option>
                <option value="world">world</option>
                <option value="politics">politics</option>
                <option value="technology">technology</option>
                <option value="sports">sports</option>
                <option value="entertainment">entertainment</option>
            </select>
            <label for="title">Title:</label>
            <textarea name="title" id="title" required></textarea>
            
            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary" required></textarea>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
            
            <label for="image_url">Image:</label>
            <input type="file" id="image" name="image" required>
            <br>
            <button type="submit" id="submit">Add Article</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Daily News Admin Panel</p>
    </footer>

</body>
</html>
