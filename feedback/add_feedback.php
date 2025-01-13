<?php
session_start();
require '../dashboard_parts/header.php';
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Banner</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Add Feedback</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_feedback_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control"
                                        value="<?=(isset($_SESSION['old_name']))?$_SESSION['old_name']:'';unset($_SESSION['old_name'])?>">
                                    <?php if(isset($_SESSION['null_error'])){ ?>
                                    <srtong class="text-danger"> <?=$_SESSION['null_error']?></strong>
                                        <?php } unset($_SESSION['null_error']); ?>

                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Designation</label>
                                    <input type="text" name="designation" id="" class="form-control"
                                        value="<?=(isset($_SESSION['old_designation']))?$_SESSION['old_designation']:'';unset($_SESSION['old_designation'])?>">
                                    <?php if(isset($_SESSION['designation_error'])){ ?>
                                    <srtong class="text-danger"> <?=$_SESSION['designation_error']?></strong>
                                        <?php } unset($_SESSION['designation_error']); ?>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea row="3" name="descrp" class="form-control"
                                        value="<?=(isset($_SESSION['old_descrp']))?$_SESSION['old_descrp']:'';unset($_SESSION['old_descrp'])?>"></textarea>
                                    <?php if(isset($_SESSION['descrp_error'])){ ?>
                                    <srtong class="text-danger"> <?=$_SESSION['descrp_error']?></strong>
                                        <?php } unset($_SESSION['descrp_error']); ?>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-5">
                                        <label for="" class="form-label">Feedback Image</label>
                                        <input type="file" name="image" id="" class="form-control" value=""
                                            oninput="pic.src=window.URL.createObjectURL(this.files[0])">

                                        <?php if(isset($_SESSION['image_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['image_error']?></strong>
                                            <?php } unset($_SESSION['image_error']); ?>

                                            <?php if(isset($_SESSION['photo_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['photo_error'];?></strong>
                                            <?php }unset($_SESSION['photo_error']); ?>

                                            <?php if(isset($_SESSION['invalid_size'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['invalid_size'];?></strong>
                                            <?php }unset($_SESSION['invalid_size']); ?>

                                            <?php if(isset($_SESSION['invalid_ext'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['invalid_ext'];?></strong>
                                            <?php }unset($_SESSION['invalid_ext']); ?>
                                    </div>
                                    <div class="col-sm-7 text-center">
                                        <img src="" width="100" id="pic">
                                    </div>
                                </div>

                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h3>
                                <a href="view_feedback.php"><button
                                        class="btn btn-warning float-left font-weight-bold mr-2"> View
                                        Feedback</button></a>
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_parts/footer.php'; ?>


<?php
 if(isset($_SESSION['feedback_inserted'])){
     ?>
<script>
Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '<?=$_SESSION['feedback_inserted']?>',
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php
 }unset($_SESSION['feedback_inserted']);
?>