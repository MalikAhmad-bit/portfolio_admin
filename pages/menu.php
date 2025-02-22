
  <body>
  <?php
  include ('../includes/head.php'); 
  include ('../partials/navbar.php'); 





?>
<head>
<style>
        :root {
            --bs-card-bg: #fff;
            --bs-card-color: #000;
            --bs-card-border-color: #ddd;
            --bs-card-border-width: 1px;
            --bs-card-border-radius: 10px;
            --bs-card-inner-border-radius: 10px;
            --bs-card-spacer-x: 1.5rem;
            --bs-card-spacer-y: 1rem;
            --bs-card-title-spacer-y: 0.75rem;
            --bs-card-title-color: #333;
            --bs-card-subtitle-color: #6c757d;
            --bs-card-cap-bg: #f8f9fa;
            --bs-card-cap-color: #495057;
            --bs-card-cap-padding-x: 1.5rem;
            --bs-card-cap-padding-y: 1rem;
        }

        .card {
            background-color: var(--bs-card-bg);
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
            padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .card-body {
            flex: 1 1 auto;
            color: var(--bs-card-color);
        }

        .card-title {
            margin-bottom: var(--bs-card-title-spacer-y);
            color: var(--bs-card-title-color);
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-description {
            color: var(--bs-card-subtitle-color);
            margin-bottom: 1rem;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
       
</head>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
         include ('../partials/sidebar.php'); 

        ?>

<div class="card mt-4 stretch-card">
    <div class="card-body">
        <h4 class="card-title">Links</h4>
        <p class="card-description">Sidebar Links</p>
        <form class="forms-sample">
            <textarea id="linkArea" placeholder="Enter links here..."></textarea>
            <div class="button-container">
                <button type="button" class="add-btn" onclick="addLink()">Add Link</button>
                <button type="button" class="delete-btn" onclick="deleteLink()">Delete Last Link</button>
            </div>
        </form>
    </div>
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
  <script>
    function addLink() {
        let link = prompt("Enter the link:");
        if (link) {
            let textArea = document.getElementById("linkArea");
            textArea.value += link + "\n";
        }
    }

    function deleteLink() {
        let textArea = document.getElementById("linkArea");
        let lines = textArea.value.trim().split("\n");
        lines.pop(); // Remove the last link
        textArea.value = lines.join("\n");
    }
</script>

</html>