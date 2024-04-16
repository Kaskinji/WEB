    
        <article class="main-content_most-resent-posts__post" >
              <img class="main-content_most-resent-posts__post__image" src="<?= $post['background_path'] ?>" alt="img">
                  <div class="main-content_most-resent-posts__post__article">
                      <h3 class="main-content_most-resent-posts__post__article-name"><?= $post['title'] ?></h3>
                      <p class="main-content_most-resent-posts__post__article-content"><?= $post['subtitle'] ?></p>
                  </div>
                  <div class="main-content_most-resent-posts__post__author">                      
                      <div class="main-content_most-resent-posts__post__author__data">
                        <div class='autor-info'>                    
                          <img class="icon" src="<?= $post['author_photo_path'] ?>" alt = "img">
                          <div class="main-content_most-resent-posts__post__author__name"><?= $post['author_info'] ?></div>                         
                        </div>                                                                      
                          <div class="main-content_most-resent-posts__post__author__date"><?= date("m/d/Y", $post['post_date']) ?></div>                       
                      </div>
                  </div>          
              <a class="post_link" href='/post.php?id=<?= $post['id'] ?>'></a>
        </article>