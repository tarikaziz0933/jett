<?php
session_start();

// Check if there is a success or error message in the session
// $toastType = '';
// $toastMessage = '';

if (isset($_SESSION['success'])) {
    $toastType = 'success';
    $toastMessage = $_SESSION['success'];
    unset($_SESSION['success']); // Clear the message after displaying
} elseif (isset($_SESSION['error'])) {
    $toastType = 'error';
    if (is_array($_SESSION['error'])) {
        $toastMessage = implode('<br>', $_SESSION['error']); // Join errors with line breaks
    } else {
        $toastMessage = $_SESSION['error'];
    }
    unset($_SESSION['error']);
}
$old_values = isset($_SESSION['old_values']) ? $_SESSION['old_values'] : [];
unset($_SESSION['old_values']);

require '../dashboard_parts/header.php'
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add About</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add About Content</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_about_post.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        value="<?php echo isset($old_values['sub_title']) ? htmlspecialchars($old_values['sub_title']) : ''; ?>">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="<?php echo isset($old_values['title']) ? htmlspecialchars($old_values['title']) : ''; ?>">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" name="descrp" class="form-control"
                                        value="<?php echo isset($old_values['descrp']) ? htmlspecialchars($old_values['descrp']) : ''; ?>">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add Content</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Banner Image</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_banner_image.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control"
                                        oninput="pic.src = window.URL.createObjectURL(this.files[0])">
                                    <img id="pic" style="max-width: 200px; max-height: 200px;" alt="" />
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php
require '../dashboard_parts/footer.php'
?>
<script>
    // Check if there's a toast type and message set by PHP
    const toastType = "<?php echo $toastType; ?>";
    const toastMessage = "<?php echo $toastMessage; ?>";
    if (toastType && toastMessage) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: toastType,
            title: toastMessage
        });
    }
</script>