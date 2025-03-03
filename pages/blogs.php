<body>
  <?php
  include ('../includes/head.php'); 
  include ('../partials/navbar.php'); 




  
  // Include your database connection
  include('../includes/config.php');
  
  // Process the form submission when the form is posted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Sanitize and retrieve form inputs
      $title = mysqli_real_escape_string($conn, $_POST['name']);
      $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
      $author = mysqli_real_escape_string($conn, $_POST['Author']);
      $publish_date = mysqli_real_escape_string($conn, $_POST['Publish_date']);
      $blog_content = mysqli_real_escape_string($conn, $_POST['blog_content']);
  
      // Set the uploads directory and ensure it exists
      $upload_dir = "../uploads/";
      if (!is_dir($upload_dir)) {
          mkdir($upload_dir, 0777, true);
      }
  
      // Handle Thumbnail Image Upload
      if (
          isset($_FILES['Thumbnail_Image']) &&
          isset($_FILES['Thumbnail_Image']['name']) &&
          !empty($_FILES['Thumbnail_Image']['name']) &&
          $_FILES['Thumbnail_Image']['error'] == UPLOAD_ERR_OK
      ) {
          $thumbnail_image = basename($_FILES['Thumbnail_Image']['name']);
          $target_file = $upload_dir . $thumbnail_image;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $allowed_types = array("jpg", "jpeg", "png", "gif");
  
          if (!in_array($imageFileType, $allowed_types)) {
              die("Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.");
          }
  
          if (!move_uploaded_file($_FILES['Thumbnail_Image']['tmp_name'], $target_file)) {
              die("Error uploading thumbnail image.");
          }
      } else {
          die("No thumbnail image uploaded.");
      }
  
      // Insert the blog data into the 'blogs' table
      $sql = "INSERT INTO blogs (title, short_description, author, publish_date, thumbnail_image, blog_content)
              VALUES ('$title', '$short_description', '$author', '$publish_date', '$thumbnail_image', '$blog_content')";
  
      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Blog post added successfully!'); window.location.href='blogs.php';</script>";
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
    <?php include ('../includes/head.php'); ?>
    <body>
      <?php include ('../partials/navbar.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include ('../partials/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Blogs </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Personal Info</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Blog Post</h4>
                    <p class="card-description"> Basic form layout </p>
                    <!-- Updated form: action is empty (self-submitting), method POST, and proper enctype -->
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Blog Title" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" placeholder="Enter Short Description" name="short_description" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" id="Author" placeholder="Author" name="Author" required>
                      </div>
                      <div class="form-group">
                        <label for="Publish_date">Publish Date</label>
                        <input type="date" class="form-control" id="Publish_date" placeholder="Publish Date" name="Publish_date" required>
                      </div>
                      <div class="form-group">
                        <label for="Thumbnail_Image">Thumbnail Image</label>
                        <input type="file" class="form-control" id="Thumbnail_Image" name="Thumbnail_Image" required>
                      </div>
                      <div class="form-group">
                        <label for="blog_content">Blog Content</label>
                        <textarea class="form-control" id="blog_content" name="blog_content" placeholder="Enter your blog content" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Post</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                  Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.
                </span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                  Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
                </span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="../../assets/vendors/select2/select2.min.js"></script>
      <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../assets/js/off-canvas.js"></script>
      <script src="../../assets/js/misc.js"></script>
      <script src="../../assets/js/settings.js"></script>
      <script src="../../assets/js/todolist.js"></script>
      <script src="../../assets/js/jquery.cookie.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="../../assets/js/file-upload.js"></script>
      <script src="../../assets/js/typeahead.js"></script>
      <script src="../../assets/js/select2.js"></script>
      <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('blog_content');
      </script>
      <!-- End custom js for this page -->
    </body>
  </html>