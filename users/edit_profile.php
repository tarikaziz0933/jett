<?php
session_start();

require '../dashboard_parts/header.php'
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="update_edit_profile.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="">Name</label>
                                    <input type="hidden" name="id" value="<?= $after_assoc_select_profile_info['id']?>"
                                        class="form-control">
                                    <input type="text" name="name"
                                        value="<?= $after_assoc_select_profile_info['name']?>" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email"
                                        value=" <?= $after_assoc_select_profile_info['email']?>" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" value="" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="">Profile Picture</label>
                                    <input type="file" name="profile_picture"
                                        oninput="pic.src = window.URL.createObjectURL(this.files[0])" value=""
                                        class="form-control">
                                    <img id="pic" style="max-width: 200px; max-height: 200px;"
                                        src="../uploads/users/<?=$after_assoc_select_profile_info['profile_picture']?>" />
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../dashboard_parts/footer.php'
?>

<?php if(isset($_SESSION['update_profile'])) {?>
<script>
Swal.fire({
    title: "Updated!",
    text: "<?= $_SESSION['update_profile']?>",
    icon: "success"
});
</script>
<?php } unset($_SESSION['update_profile']) ?>