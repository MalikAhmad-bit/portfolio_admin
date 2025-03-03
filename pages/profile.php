<body>
<?php
include ('../includes/head.php'); 
include ('../partials/navbar.php'); 
require '../includes/config.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prevent Undefined Array Key Errors
    $email = isset($_POST['Email_address']) ? $_POST['Email_address'] : '';
    $facebook = isset($_POST['Facebook']) ? $_POST['Facebook'] : '';
    $instagram = isset($_POST['Instagram']) ? $_POST['Instagram'] : '';
    $linkedin = isset($_POST['LinkedIn']) ? $_POST['LinkedIn'] : '';
    $github = isset($_POST['Github']) ? $_POST['Github'] : '';
    $address = isset($_POST['Address']) ? $_POST['Address'] : '';

    // Insert into Database
    $sql = "INSERT INTO users (email, facebook, instagram, linkedin, github, address) 
            VALUES ('$email', '$facebook', '$instagram', '$linkedin', '$github', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data inserted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
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
            <div class="container mt-4">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <p class="card-description">Basic form layout</p>
                    <form class="forms-sample" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Username" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="Email_address">Email address</label>
                            <input type="email" class="form-control" id="Email_address" placeholder="Email" name="Email_address" required>
                        </div>
                        <div class="form-group">
                            <label for="Facebook">Facebook</label>
                            <input type="text" class="form-control" id="Facebook" placeholder="Facebook" name="Facebook">
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
                            <input type="text" class="form-control" id="Github" placeholder="Github" name="Github">
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
                        <a href="display_users.php" class="btn btn-info">View Users</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<<?php
include '../includes/config.php'; // Database Connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $about_heading = isset($_POST['About_Heading']) ? $_POST['About_Heading'] : '';
    $about_description = isset($_POST['About_Description']) ? $_POST['About_Description'] : '';

    // Handle CV Upload
    $cv_file = ''; 
    if (isset($_FILES['CV']) && $_FILES['CV']['error'] == UPLOAD_ERR_OK) {
        $cv_tmp_name = $_FILES['CV']['tmp_name'];
        $cv_file_name = basename($_FILES['CV']['name']);
        $cv_upload_path = "uploads/" . $cv_file_name; 
        if (move_uploaded_file($cv_tmp_name, $cv_upload_path)) {
            $cv_file = $cv_upload_path; 
        } else {
            echo "<div class='alert alert-danger'>Error uploading CV.</div>";
        }
    }

    // Insert into Database
    $sql = "INSERT INTO about_section (about_heading, about_description, cv_file) 
            VALUES ('$about_heading', '$about_description', '$cv_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>About Section Updated Successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<!-- About Us Form -->
<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">About Us</h4>
            <p class="card-description">Horizontal form layout</p>
            <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="About_Heading" class="col-sm-3 col-form-label">About Heading</label>
                    <div class="col-sm-9">
                        <input type="text" name="About_Heading" class="form-control" id="About_Heading" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="About_Description" class="col-sm-3 col-form-label">About Description</label>
                    <div class="col-sm-9">
                        <textarea name="About_Description" class="form-control" id="About_Description" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CV" class="col-sm-3 col-form-label">CV</label>
                    <div class="col-sm-9">
                        <input type="file" name="CV" class="form-control" id="CV" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>


<?php
include '../includes/config.php'; // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $small_heading = isset($_POST['Small_heading']) ? $_POST['Small_heading'] : '';
    $main_heading = isset($_POST['Main_Heading']) ? $_POST['Main_Heading'] : '';
    $button_text = isset($_POST['Button_text']) ? $_POST['Button_text'] : '';

    // Ensure "uploads/" directory exists
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle Image Upload
    $main_image = ''; // Default empty value
    if (isset($_FILES['Main_Image']) && $_FILES['Main_Image']['error'] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['Main_Image']['tmp_name'];
        $image_name = basename($_FILES['Main_Image']['name']);
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $main_image = $image_path; // Store file path in DB
        } else {
            echo "<div class='alert alert-danger'>Error uploading image.</div>";
        }
    }

    // Insert Data into Database
    $sql = "INSERT INTO hero_section (small_heading, main_heading, button_text, main_image) 
            VALUES ('$small_heading', '$main_heading', '$button_text', '$main_image')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Hero Section Updated Successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>



<!-- Hero Section Details -->
<div class="card mt-4 stretch-card">
  <div class="card-body">
    <h4 class="card-title">Hero Section</h4>
    <p class="card-description"> Horizontal form layout </p>

    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="Small_heading" class="col-sm-3 col-form-label">Small heading</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="Small_heading" id="Small_heading" placeholder="Small Heading">
        </div>
      </div>
      <div class="form-group row">
        <label for="Main_Heading" class="col-sm-3 col-form-label">Main Heading</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="Main_Heading" id="Main_Heading" placeholder="Main Heading">
        </div>
      </div>
      <div class="form-group row">
        <label for="Button_text" class="col-sm-3 col-form-label">Button Text</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="Button_text" id="Button_text" placeholder="Button Text">
        </div>
      </div>
      <div class="form-group row">
        <label for="Main_Image" class="col-sm-3 col-form-label">Main Image</label>
        <div class="col-sm-9">
          <input type="file" class="form-control" name="Main_Image" id="Main_Image">
        </div>
      </div>
      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Submit</button>
      <button type="reset" class="btn btn-light">Cancel</button>
    </form>
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