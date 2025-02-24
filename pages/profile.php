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
              <h3 class="page-title"> Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Personal Info</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" name="name">
                      </div>
                      <div class="form-group">
                        <label for="Email_address">Email address</label>
                        <input type="email" class="form-control" id="Email_address" placeholder="Email" name="Email_address">
                      </div>
                      <div class="form-group">
                        <label for="Facebook">Facebook</label>
                        <input type="text" class="form-control" id="Facebook" placeholder="facebok" name="Facebook">
                      </div>
                      <div class="form-group">
                        <label for="Instagram">Instagram</label>
                        <input type="text" class="form-control" id="Instagram" placeholder="Instagram" name="Instagram">
                      </div>
                      <div class="form-group">
                        <label for="LinkedIn">LinkedIn</label>
                        <input type="text" class="form-control" id="LinkedIn" placeholder="LinkedIn" name="LinkedIn">
                      </div>
                      <div class="form-group">
                        <label for="Github">Github</label>
                        <input type="text" class="form-control" id="Github" placeholder="github" name="Github">
                      </div>
                      <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" placeholder="Input your Address" name="Address">
                      </div>
                      <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="Phone" placeholder="Input your Phone no." name="Phone">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">About Us</h4>
                    <p class="card-description"> Horizontal form layout </p>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="About_Heading" class="col-sm-3 col-form-label">Heading</label>
                        <div class="col-sm-9">
                          <input type="text" for="About_Heading" class="form-control" id="About_Heading" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="About_Description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                          <input type="textarea" class="form-control" id="About_Description" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="CV" class="col-sm-3 col-form-label">CV</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="CV" >
                        </div>
                      </div>
                   
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>

                  </div>
                </div>
                <!-- Hero Section Details -->
                <div class="card mt-4 stretch-card">
                  <div class="card-body">
                    <h4 class="card-title">Hero Section</h4>
                    <p class="card-description"> Horizontal form layout </p>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="Small_heading" class="col-sm-3 col-form-label">Small heading</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Small_heading" placeholder="Small_Heading">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Main_Heading" class="col-sm-3 col-form-label">Main Heading</label>
                        <div class="col-sm-9">
                          <input type="textarea" class="form-control" id="Main_Heading" placeholder="Main_Heading">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Button_text" class="col-sm-3 col-form-label">Button text</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Button_text" placeholder="Button_text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Main_Image" class="col-sm-3 col-form-label">Main Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="Main_Image" >
                        </div>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>

                  </div>
                </div>
              </div>
          
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
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
    <!-- End custom js for this page -->
  </body>
</html>