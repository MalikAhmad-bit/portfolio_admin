<body>
    <?php
    include ('../includes/head.php'); 
    include ('../partials/navbar.php'); 
    ?>
<?php
require '../includes/config.php'; // Ensure this file sets up your $conn variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if project titles are submitted (we assume other fields are arrays too)
    if (isset($_POST['projectTitle']) && is_array($_POST['projectTitle'])) {

        // Retrieve arrays from POST
        $titles         = $_POST['projectTitle'];
        $descriptions   = $_POST['projectDescription'];
        $links          = $_POST['projectLink'];
        $categories     = $_POST['projectCategory'];
        $startDates     = $_POST['startDate'];
        $endDates       = $_POST['endDate'];
        
        // Optional: If you add a hidden input for skills, they might be in $_POST['skillsUsed']
        $skillsArray    = isset($_POST['skillsUsed']) ? $_POST['skillsUsed'] : array();

        // Handle file uploads from the file input array
        // Note: $_FILES['projectThumbnail'] contains arrays of file info
        $thumbnails = $_FILES['projectThumbnail'];

        // Define the uploads directory for projects
        $upload_dir = "../uploads/projects/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $numProjects = count($titles);
        $successCount = 0;

        // Loop through each project submission
        for ($i = 0; $i < $numProjects; $i++) {
            // Sanitize inputs
            $title       = mysqli_real_escape_string($conn, trim($titles[$i]));
            $description = mysqli_real_escape_string($conn, trim($descriptions[$i]));
            $link        = mysqli_real_escape_string($conn, trim($links[$i]));
            $category    = mysqli_real_escape_string($conn, trim($categories[$i]));
            $startDate   = mysqli_real_escape_string($conn, trim($startDates[$i]));
            $endDate     = mysqli_real_escape_string($conn, trim($endDates[$i]));

            // For skills, if available; otherwise, set to empty string
            $skills = "";
            if (isset($skillsArray[$i])) {
                $skills = mysqli_real_escape_string($conn, trim($skillsArray[$i]));
            }
            
            // Process file upload for the project's thumbnail
            $thumbnail_name = "";
            if (isset($thumbnails['name'][$i]) && !empty($thumbnails['name'][$i])) {
                $originalName = basename($thumbnails['name'][$i]);
                $target_file = $upload_dir . $originalName;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = array("jpg", "jpeg", "png", "gif");

                if (!in_array($imageFileType, $allowed_types)) {
                    echo "Invalid file format for project " . ($i + 1) . ". Only JPG, JPEG, PNG, and GIF are allowed. ";
                    continue; // Skip this project
                }

                if (!move_uploaded_file($thumbnails['tmp_name'][$i], $target_file)) {
                    echo "Error uploading file for project " . ($i + 1) . ". ";
                    continue; // Skip this project
                }
                $thumbnail_name = $originalName; // Store only the file name (or you can store $target_file if needed)
            } else {
                echo "No thumbnail uploaded for project " . ($i + 1) . ". ";
                continue; // Skip if no thumbnail provided
            }

            // Build and execute the INSERT query
            $sql = "INSERT INTO projects (project_title, project_description, project_link, project_thumbnail, skills_used, project_category, start_date, end_date)
                    VALUES ('$title', '$description', '$link', '$thumbnail_name', '$skills', '$category', '$startDate', '$endDate')";

            if (mysqli_query($conn, $sql)) {
                $successCount++;
            } else {
                echo "Error inserting project " . ($i + 1) . ": " . mysqli_error($conn) . " ";
            }
        }

        // Display a success message if at least one project was inserted
        if ($successCount > 0) {
            echo "<div class='alert alert-success'>Successfully inserted $successCount project(s).</div>";
        } else {
            echo "<div class='alert alert-danger'>No projects were inserted.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No project data received.</div>";
    }
}
?>

    <style>
    .skills-list .badge {
        margin-right: 5px;
    }
    label {
        margin-bottom: 8px;
    }
    .remove-project {
        color: red;
        cursor: pointer;
        float: right;
    }

    .skills-list .badge {
        margin-right: 5px;
    }

    label{
        margin-bottom: 8px;
        
    }
    </style>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php
            include ('../partials/sidebar.php'); 

            ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Portfolio Upload </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Portfolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Project</li>
              </ol>
            </nav>
          </div>
          <!-- Projects Upload Form -->
          <!-- IMPORTANT: The form uses POST method with file uploads -->
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Projects Builder</h4>
                  <p class="card-description">Dynamic Project Upload Inputs</p>
                  <!-- Make sure action is set to the current page (or your processing script) -->
                  <form class="forms-sample" id="projectsForm" action="" method="POST" enctype="multipart/form-data">
                    <div id="projectInputs">
                      <div class="project-group mb-3" id="projectGroup_1">
                        <label for="projectTitle_1">Project Title</label>
                        <input type="text" class="form-control mb-2" id="projectTitle_1" placeholder="Project Title" name="projectTitle[]" required>
                        
                        <label for="projectDescription_1">Project Description</label>
                        <textarea class="form-control mb-2" id="projectDescription_1" placeholder="Project Description" name="projectDescription[]" required></textarea>
                        
                        <label for="projectLink_1">Project Link</label>
                        <input type="text" class="form-control mb-2" id="projectLink_1" placeholder="Project Link" name="projectLink[]" required>
                        
                        <label for="projectThumbnail_1">Project Thumbnail</label>
                        <input type="file" class="form-control mb-2" id="projectThumbnail_1" name="projectThumbnail[]" required>
                        
                        <!-- If you plan to store skills, you can add hidden inputs or process them separately -->
                        <label for="projectCategory_1">Project Category</label>
                        <input type="text" class="form-control mb-2" id="projectCategory_1" placeholder="Project Category" name="projectCategory[]" required>
                        
                        <label for="startDate_1">Start Date</label>
                        <input type="date" class="form-control mb-2" id="startDate_1" name="startDate[]" required>
                        
                        <label for="endDate_1">End Date</label>
                        <input type="date" class="form-control mb-2" id="endDate_1" name="endDate[]" required>
                      </div>
                    </div>
                    <button type="button" class="btn btn-success mb-3 mt-3" id="addNewProject">Add New Project</button>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              Copyright © 2023 BootstrapDash. All rights reserved.
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
              Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
      </div>
    </div>
    <?php include ('../includes/postjs.php'); ?>
    <!-- jQuery (Required for dynamic input handling) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS for dynamically adding/removing project groups -->
    <script>
      $(document).ready(function() {
          var projectCount = 1;

          // Add new project input group
          $('#addNewProject').on('click', function() {
              projectCount++;
              var newProjectInputs = `
              <div class="project-group mb-3" id="projectGroup_${projectCount}">
                  <span class="remove-project" data-project="${projectCount}">Remove Project &times;</span>
                  <label for="projectTitle_${projectCount}">Project Title</label>
                  <input type="text" class="form-control mb-2" id="projectTitle_${projectCount}" placeholder="Project Title" name="projectTitle[]" required>
                  
                  <label for="projectDescription_${projectCount}">Project Description</label>
                  <textarea class="form-control mb-2" id="projectDescription_${projectCount}" placeholder="Project Description" name="projectDescription[]" required></textarea>
                  
                  <label for="projectLink_${projectCount}">Project Link</label>
                  <input type="text" class="form-control mb-2" id="projectLink_${projectCount}" placeholder="Project Link" name="projectLink[]" required>
                  
                  <label for="projectThumbnail_${projectCount}">Project Thumbnail</label>
                  <input type="file" class="form-control mb-2" id="projectThumbnail_${projectCount}" name="projectThumbnail[]" required>
                  
                  <label for="projectCategory_${projectCount}">Project Category</label>
                  <input type="text" class="form-control mb-2" id="projectCategory_${projectCount}" placeholder="Project Category" name="projectCategory[]" required>
                  
                  <label for="startDate_${projectCount}">Start Date</label>
                  <input type="date" class="form-control mb-2" id="startDate_${projectCount}" name="startDate[]" required>
                  
                  <label for="endDate_${projectCount}">End Date</label>
                  <input type="date" class="form-control mb-2" id="endDate_${projectCount}" name="endDate[]" required>
              </div>
            `;
            $('#projectInputs').append(newProjectInputs);
        });

        // Remove project group
        $(document).on('click', '.remove-project', function() {
            var projectId = $(this).data('project');
            $('#projectGroup_' + projectId).remove();
        });

        // Handle skill input as pills
        $(document).on('keypress', 'input[id^="skillsUsedInput_"]', function(e) {
            if (e.which == 13) { // Enter key pressed
                e.preventDefault();
                var skill = $(this).val().trim();
                if (skill !== "") {
                    var pill = <span class="badge badge-info">${skill} <span class="remove-skill" style="cursor:pointer;">&times;</span></span>;
                    $(this).siblings('.skills-list').append(pill);
                    $(this).val('');
                }
            }
        });

        // Remove skill pill
        $(document).on('click', '.remove-skill', function() {
            $(this).parent().remove();
        });
    });
</script>

    </body>
    </html>