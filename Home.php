<?php
$featured_posts = [
 [
   'id' => 1, 
   'title' => 'The Road Ahead',
   'subtitle' => 'The road ahead might be paved - it might not be.',
   'background_path' => 'images/post1-lb2.jpg',
   'author_photo_path' => 'images/icon1.jpg',
   'author_info' => 'Mat Vogels',
   'author' => 'Me',
   'post_date' => 1443139200
 ],

 [
   'id' => 2, 
   'title' => 'From Top Down',
   'subtitle' => 'Once a year, go someplace you’ve never been before.',
   'background_path' => 'images/post2-lb2.jpg',
   'author_photo_path' => 'images/icon2.jpg',
   'author_info' => 'William Wong',
   'author' => 'Me',
   'post_date' => 1443139200
 ],
];

$posts = [
[
    'id' => 3, 
   'title' => 'Still Standing Tall',
   'subtitle' => 'Life begins at the end of your comfort zone.',
   'background_path' => 'images/most-recent-post1.jpg',
   'author_photo_path' => 'images/icon2.jpg',
   'author_info' => 'William Wong',
   'post_date' => 1443139200
],

[
    'id' => 4, 
   'title' => 'Sunny Side Up',
   'subtitle' => 'No place is ever as bad as they tell you it`s going to be.',
   'background_path' => 'images/most-recent-post2.jpg',
   'author_photo_path' => 'images/icon1.jpg',
   'author_info' => 'Mat Vogels',
   'post_date' => 1443139200
],

[
    'id' => 5, 
   'title' => 'Water Falls',
   'subtitle' => 'We travel not to escape life, but for life not to escape us.',
   'background_path' => 'images/most-recent-post3.jpg',
   'author_photo_path' => 'images/icon2.jpg',
   'author_info' => 'Mat Vogels',
   'post_date' => 1443139200
],

[
    'id' => 6, 
   'title' => 'Through the Mist',
   'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
   'background_path' => 'images/most-recent-post4.jpg',
   'author_photo_path' => 'images/icon2.jpg',
   'author_info' => 'William Wong',
   'post_date' => 1443139200
],

[
    'id' => 7, 
   'title' => 'Awaken Early',
   'subtitle' => 'Not all those who wander are lost.',
   'background_path' => 'images/most-recent-post5.jpg',
   'author_photo_path' => 'images/icon1.jpg',
   'author_info' => 'Mat Vogels',
   'post_date' => 1443139200
],

[
    'id' => 8, 
   'title' => 'Try it Always',
   'subtitle' => 'The world is a book, and those who do not travel read only one page.',
   'background_path' => 'images/most-recent-post6.jpg',
   'author_photo_path' => 'images/icon1.jpg',
   'author_info' => 'Mat Vogels',
   'post_date' => 1443139200
]
]
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>LW2</title>
    <link rel="stylesheet" href="/styles/Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet">
</head>
  <body>
    <header class="header">
      <div class="header__navigation">
        <div class="navigation-menu">
            <img src="images\Escape-white.svg" alt="logo-top">
            <nav class="navigation-list">
                <a href="#" class="navigate__list-element">home</a>
                <a href="#" class="navigate__list-element">categories</a>
                <a href="#" class="navigate__list-element">about</a>
                <a href="#" class="navigate__list-element">contact</a>
            </nav>
        </div>
      </div>
      <div class="header__content-area">
        <div class="main__phrase">
          <span class="header__main-title_top">Let's do it together.</span>
          <span class="header__main-title_bot">We travel the world in search of stories. Come along for the ride.</span>
          <button class="header__latest-posts-button">View Latest Posts</button>    
        </div>  
      </div>    
    </header>
      <div class="categories-menu">
        <nav class="categories-menu__navigation">
          <a href='#' class="categories-menu__element">Nature</a>
          <a href='#' class="categories-menu__element">Photography</a>
          <a href='#' class="categories-menu__element">Relaxation</a>
          <a href='#' class="categories-menu__element">Vacation</a>
          <a href='#' class="categories-menu__element">Travel</a>
          <a href='#' class="categories-menu__element">Adventure</a>
        </nav>  
      </div>
      <div class="main">
        
        <section class="main-content_featured-posts">
          <div class="featured-posts_heading">
              <h2 class="heading">Featured Posts</h2>
              <div class="decorative_line">&nbsp;</div>
          </div>

          <?php
            foreach ($featured_posts as $featured_post) {
                include 'featured_post_preview.php';
            }
          ?>
          
        </section>
        <section class="main-content_most-resent-posts">
          <div class="main-content_most-resent-posts_heading">
              <div>
                  <h2 class="heading">Most Recent</h2>
              </div>
              <div class="decotative_line">&nbsp;</div>
          </div>

          <?php
            foreach ($posts as $post) {
                include 'most_recent_post_preview.php';
            }
          ?>

        </section>
      </div>
    <footer class="footer">
      <div class="navigate-footer">
        <div class="navigation-menu">
            <div class="escape-down">
                <img src="images\Escape-white.svg" alt="logo-top">
            </div>    
            <nav class="navigation-list">
                <a href="#" class="navigate__list-element"><span class="item_header">home</span></a>
                <a href="#" class="navigate__list-element"><span class="item_header">categories</span></a>
                <a href="#" class="navigate__list-element"><span class="item_header">about</span></a>
                <a href="#" class="navigate__list-element"><span class="item_header">contact</span></a>
            </nav>
        </div>
      </div>
    </footer>
</body>
</html>