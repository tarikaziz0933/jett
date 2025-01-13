<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';
$id = $_GET['id'];

$feedback = "SELECT * FROM feedbacks WHERE id='$id'";
$feedback_res = mysqli_query($db_connect, $feedback);
$feedback_assooc = mysqli_fetch_assoc($feedback_res);

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
                            <h3 class="text-light">Edit Feedback</h3>
                        </div>
                        <div class="card-body">
                            <form action="feedback_edit_post.php" method="post" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control"
                                        value="<?=$feedback_assooc['name']?>">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Designation</label>
                                    <input type="text" name="designation" id="" class="form-control"
                                        value="<?=$feedback_assooc['designation']?>">
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-5">
                                        <label for="" class="form-label">Work Image</label>
                                        <input type="file" name="image" id="" class="form-control" value=""
                                            oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        <?php if(isset($_SESSION['invalid_size'])){ ?>
                                        <strong class="text-danger"><?php echo $_SESSION['invalid_size'];?></strong>
                                        <?php }unset($_SESSION['invalid_size']); ?>

                                        <?php if(isset($_SESSION['invalid_ext'])){ ?>
                                        <strong class="text-danger"><?php echo $_SESSION['invalid_ext'];?></strong>
                                        <?php }unset($_SESSION['invalid_ext']); ?>
                                    </div>
                                    <div class="col-sm-7 text-center">
                                        <img src="../uploads/feedback/<?=$feedback_assooc['image']?>" width="100"
                                            id="pic">
                                    </div>
                                </div>

                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
                                </div>
                            </form>
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
 if(isset($_SESSION['feedback_update'])){
     ?>
<script>
Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '<?=$_SESSION['feedback_update']?>',
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php
 }unset($_SESSION['feedback_update']);
?>