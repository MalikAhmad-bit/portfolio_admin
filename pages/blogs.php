<body>
  <?php
  include ('../includes/head.php'); 
  include ('../partials/navbar.php'); 






?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
         include ('../partials/sidebar.php'); 

        ?>
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
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" name="name">
                      </div>
                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea  class="form-control" id="short_description" placeholder="Enter Short Description" name="short_description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="Facebook">Author</label>
                        <input type="text" class="form-control" id="Author" placeholder="Author" name="Author">
                      </div>
                      <div class="form-group">
                        <label for="Publish_date">Publish_date</label>
                        <input type="date" class="form-control" id="Publish_date" placeholder="Publish_date" name="Publish_date">
                      </div>
                      <div class="form-group">
                        <label for="Thumbnail_Image">Thumbnail Image</label>
                        <input type="file" class="form-control" id="Thumbnail_Image"   name="Thumbnail_Image">
                      </div>
                      <div class="form-group">
                        <label for="blog_content">Blog Content</label>
                        <textarea class="form-control" id="blog_content" name="blog_content" placeholder="Enter your blog content"></textarea>
                      </div>

                   
                      <button type="submit" class="btn btn-gradient-primary me-2">Post</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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