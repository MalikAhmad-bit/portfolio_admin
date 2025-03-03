<?php
include('../includes/config.php');  // Ensure this file sets up your $conn variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve arrays from the form
    $linkNames = isset($_POST['linkName']) ? $_POST['linkName'] : array();
    $linkTargets = isset($_POST['linkTarget']) ? $_POST['linkTarget'] : array();

    // Loop through the inputs and insert each link if both name and target are provided
    for ($i = 0; $i < count($linkNames); $i++) {
        $name = mysqli_real_escape_string($conn, trim($linkNames[$i]));
        $target = mysqli_real_escape_string($conn, trim($linkTargets[$i]));

        if (!empty($name) && !empty($target)) {
            $sql = "INSERT INTO menu_links (link_name, link_target) VALUES ('$name', '$target')";
            mysqli_query($conn, $sql);
        }
    }
    // Redirect to the same page (or another page) after processing
    header("Location: menu.php");
    exit();
}
?>


<body>
  <?php
    include ('../includes/head.php'); 
    include ('../partials/navbar.php'); 
  ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include ('../partials/sidebar.php'); ?>
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
                <h4 class="card-title">Links Builder</h4>
                <p class="card-description">Dynamic Link Inputs</p>
                <!-- Added method and action -->
                <form class="forms-sample" id="linksForm" action="" method="POST">
                  <div id="linkInputs">
                    <div class="link-group mb-3">
                      <label for="linkName_1">Link Name</label>
                      <input type="text" class="form-control mb-2" id="linkName_1" placeholder="Link Name" name="linkName[]">
                      <label for="linkTarget_1">Link Target</label>
                      <input type="text" class="form-control" id="linkTarget_1" placeholder="Link Target" name="linkTarget[]">
                    </div>
                  </div>
                  <button type="button" class="btn btn-success mb-3 mt-3" id="addNewLink">Add New</button>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button type="reset" class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
            Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">
            BootstrapDash</a>. All rights reserved.
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
  <!-- jQuery (Required for dynamic input handling) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var linkCount = 1;
      $('#addNewLink').on('click', function() {
        linkCount++;
        var newLinkInputs = `
          <div class="link-group mb-3">
            <label for="linkName_${linkCount}">Link Name</label>
            <input type="text" class="form-control mb-2" id="linkName_${linkCount}" placeholder="Link Name" name="linkName[]">
            <label for="linkTarget_${linkCount}">Link Target</label>
            <input type="text" class="form-control" id="linkTarget_${linkCount}" placeholder="Link Target" name="linkTarget[]">
            <button type="button" class="btn btn-danger mt-2 remove-link">Remove</button>
          </div>
        `;
        $('#linkInputs').append(newLinkInputs);
      });
      $(document).on('click', '.remove-link', function() {
        $(this).closest('.link-group').remove();
      });
    });
  </script>
  <!-- End custom js for this page -->
</body>
</html>