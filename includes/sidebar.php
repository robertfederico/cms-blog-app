      <!-- Blog Sidebar Widgets Column -->
      <div class="col-md-4">
          <!-- Blog Search Well -->
          <div class="card shadow p-4 mb-3">
              <h4>Blog Search</h4>

              <form action="search.php" method="POST">
                  <div class="sidebar-search">
                      <div>
                          <div class="input-group">
                              <input type="text" class="form-control search-menu" name="search" id="search"
                                  placeholder="Search...">
                              <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit" name="submit">
                                      <span class="fa fa-search"></span>
                                  </button>
                              </span>
                          </div>
                      </div>
                  </div>
              </form>
          </div>

          <div class="card shadow p-4 mb-3">
              <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($conn, $query);
                ?>
              <h4>Blog Categories</h4>
              <div class="row">
                  <div class="col-lg-12">
                      <ul class="list-unstyled">
                          <?php
                            while ($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_title = $row['category_title'];
                                echo "<li><a href='#'>{$cat_title}</a></li>";
                            }
                            ?>
                      </ul>
                  </div>
              </div>
          </div>

          <!-- Side Widget Well -->
          <?php include 'widget.php'; ?>

      </div>