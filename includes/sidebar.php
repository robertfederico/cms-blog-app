      <!-- Blog Sidebar Widgets Column -->
      <div class="col-md-8 mb-5">
          <h4>Categories</h4>
          <div class="cat-container">
              <?php
          $query = "SELECT * FROM categories LIMIT 6";
          $select_categories = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($select_categories)) {
            $category_id = $row['category_id'];
            $cat_title = $row['category_title'];
            $cat_image = $row['cat_image'];
          ?>
              <div class="caption">
                  <a class="category_link" href="categories.php?category=<?php echo $category_id; ?>">
                      <img src="images/<?php echo $cat_image; ?>" />
                      <h5 class="cat-title"><?php echo $cat_title; ?></h5>
                  </a>
              </div>
              <?php
          }
          ?>
          </div>
          <!-- Side Widget Well -->
          <?php //include 'widget.php'; 
        ?>
      </div>