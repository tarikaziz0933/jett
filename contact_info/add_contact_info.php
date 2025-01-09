<?php 
session_start();
require '../dashboard_parts/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Icons</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Contact Info</h3>
                        </div>
                        <div class="card-body">
                            <form action="contact_info_post.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Phone Number</label>
                                    <input type="text" name="number" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php 
require '../dashboard_parts/footer.php'
?>
<?php if(isset($_SESSION['success'])) { ?>
<script>
Swal.fire({
    icon: "success",
    title: "Success",
    text: "<?= $_SESSION['success']?>",
});
</script>
<?php } unset($_SESSION['success']) ?>