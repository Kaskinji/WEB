<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}

function getFeaturePosts(mysqli $conn, &$feature_posts): void
{
    $sql = "SELECT * FROM post WHERE featured = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $feature_posts[] = $row;
        }
    }
}

function getMostRecentPosts(mysqli $conn, &$posts): void
{
    $sql = "SELECT * FROM post WHERE featured = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Главная страница блога</title>
    <link rel="stylesheet" href="styles/Home.css">
</head>

<body>
    <header class="header">
        <div class="header__navigate">
            <div class="navigate">
                <img src = "images\Escape-white.svg" alt="logo-top">
                <nav class="navigate__list">
                    <a href="#" class="navigate__list-item"><span class="item_header">home</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_header">categories</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_header">about</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_header">contact</span></a>
                </nav>
            </div>
        </div>
        <div class="header__content-area">
            <div class="header__main-filling">
                <span class="header__main-filling_top">Let's do it together.</span>
                <span class="header__main-filling_bot">We travel the world in search of stories. Come along for the
                    ride.</span>
                <div class="header__latest-posts-btn">
                    <span class="header__latest-posts-btn_txt">View Latest Posts</span>
                </div>
            </div>
        </div>
    </header>
    <div class="categories-menu">
        <nav class="categories-menu__navigate">
            <a href="#" class="categories-menu__navigate_item">Nature</a>
            <a href="#" class="categories-menu__navigate_item">Photography</a>
            <a href="#" class="categories-menu__navigate_item">Relaxation</a>
            <a href="#" class="categories-menu__navigate_item">Vacation</a>
            <a href="#" class="categories-menu__navigate_item">Travel</a>
            <a href="#" class="categories-menu__navigate_item">Adventure</a>
        </nav>
    </div>
    <div class="main-content">
        <div class="feature-posts">
            <div class="main-category__header">
                <span class="main-category__header_txt">Featured Posts</span>
                <div class="posts_header_underline"></div>
            </div>
            <?php
            $feature_posts = [];
            $conn = createDBConnection();
            getFeaturePosts($conn, $feature_posts);
            closeDBConnection($conn);
            foreach ($feature_posts as $feature_post) {
                include 'feature_post_preview.php';
            }
            ?>
        </div>
        <div class="most-recent-posts">
            <div class="main-category__header">
                <span class="main-category__header_txt">Most Recent</span>
                <div class="posts_header_underline"></div>
            </div>
            <?php
            $posts = [];
            $conn = createDBConnection();
            getMostRecentPosts($conn, $posts);
            closeDBConnection($conn);
            foreach ($posts as $post) {
                include 'most_recent_post_preview.php';
            }
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__navigate">
            <div class="navigate">
                <img src="images\Escape-white.svg" alt="logo-bot">
                <nav class="navigate__list">
                    <a href="#" class="navigate__list-item"><span class="item_footer">home</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_footer">categories</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_footer">about</span></a>
                    <a href="#" class="navigate__list-item"><span class="item_footer">contact</span></a>
                </nav>
            </div>
        </div>
    </footer>
</body>

</html>