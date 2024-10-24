<?php
session_start();
require 'session_check.php';
require "db.php";
$id = $_GET["id"];

$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);

// print_r($select_user_result);
// die();
// echo $after_assoc['name'];
?>
<?php require 'dashboard_parts/header.php'?>

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
                        <h3>Edit User</h3>
                    </div>


                    <div class="card-body">
                        <form action="update_user.php" method="POST" enctype="multipart/form-data">
                            <div class="mt-3">
                                <label for="" class="form-label">Your Name</label>
                                <input type="hidden" value="<?=$after_assoc['id']?>" class="form-control" name="id"
                                    required>
                                <input type="text" value="<?=$after_assoc['name']?>" class="form-control" name="name"
                                    required>
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Email</label>
                                <input type="email" value="<?=$after_assoc['email']?>" class="form-control" name="email"
                                    required>
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mt-3">
                                <label for="">Photo</label>
                                <img id="pic" style="max-width: 200px; max-height: 200px;"
                                    src="uploads/users/<?=$after_assoc['profile_picture']?>" />
                                <input class="mt-3" type="file" class="form-control" name="profile_picture"
                                    oninput="pic.src = window.URL.createObjectURL(this.files[0])">

                                <?php if(isset($_SESSION['extension'])){?>
                                <strong class="text-danger"><?= $_SESSION['extension']?></strong>
                                <?php } unset($_SESSION['extension'])?>

                                <?php if(isset($_SESSION['size'])){?>
                                <strong class="text-danger"><?= $_SESSION['size']?></strong>
                                <?php } unset($_SESSION['size'])?>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-page-title -->

</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<?php require 'dashboard_parts/footer.php'?>



<?php if(isset($_SESSION['update'])) { ?>
<script>
alert('hvhjvjh')
Swal.fire({
    position: "top-end",
    icon: "update",
    title: '<?= $_SESSION['update']?>',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } unset($_SESSION['update']) ?>