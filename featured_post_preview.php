
            <article class="main-content_featured-posts__post featured-posts_post" style="background-image: url(<?=$featured_post['background_path'] ?>);">
              <div class="main-content_featured-posts__post_content untagged">
                  <h3 class="main-content_featured-posts__post_content__article-name"><?= $featured_post['title'] ?></h3>
                  <p class="main-content_featured-posts__post_content__acticle-content "><?= $featured_post['subtitle'] ?></p>
                  <div class="main-content_featured-posts__post__author">     
                      <div class="main-content_featured-posts__post__author__data">
                        <div class="autor-info">
                          <img class="icon" src ="<?= $featured_post['author_photo_path']?>" alt = "img">                       
                          <div class="main-content_featured-posts__post__author__name"><?= $featured_post['author_info'] ?></div>
                        </div>
                          <div class="main-content_featured-posts__post__author__date"><?= date("m/d/Y", $featured_post['post_date']) ?></span></div>
                  </div>
              </div>
              <a class="post_link" href='/post.php?id=<?= $post['subtitle'] ?>'></a>
            </article>
