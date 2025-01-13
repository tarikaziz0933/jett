<?php 
session_start();
require '../dashboard_parts/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Client</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Client</h3>
                    </div>
                    <div class="card-body">
                        <form action="add_client_image_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Upload Client Image</label>
                                <input type="file" name="client" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Client</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
require '../dashboard_parts/footer.php';
?>
<?php if(isset($_SESSION['success'])) { ?>
<script>
Swal.fire({
    position: "top-end",
    icon: "success",
    title: '<?= $_SESSION['success']?>',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } unset($_SESSION['success']) ?>