<?php
session_start();
// require '../db.php';
?>
<?php require '../dashboard_parts/header.php'?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Register here</h3>
                    </div>


                    <div class="card-body">
                        <form action="register_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mt-3">
                                <label for="" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mt-3">

                                <input type="file" class="form-control" name="profile_picture"
                                    oninput="pic.src = window.URL.createObjectURL(this.files[0])">
                                <img id="pic" style="max-width: 200px; max-height: 200px;" alt="" />

                            </div>

                            <?php if(isset($_SESSION['extension'])){?>
                            <strong class="text-danger"><?= $_SESSION['extension']?></strong>
                            <?php } unset($_SESSION['extension'])?>

                            <?php if(isset($_SESSION['size'])){?>
                            <strong class="text-danger"><?= $_SESSION['size']?></strong>
                            <?php } unset($_SESSION['size'])?>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Regiser</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<?php require '../dashboard_parts/footer.php'?>

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

<?php if(isset($_SESSION['exist'])) { ?>
<script>
Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "<?= $_SESSION['exist']?>",
});
</script>
<?php } unset($_SESSION['exist']) ?>