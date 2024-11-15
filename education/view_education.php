<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

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

$select_education_content = "SELECT * FROM education_contents";
$select_education_content_result = mysqli_query($db_connect, $select_education_content);

// $select_image_content = "SELECT * FROM education_contents";
// $select_about_image_result = mysqli_query($db_connect, $select_image_content);

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-header">About Content List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Passing Year</th>
                                        <th>Education Info</th>
                                        <th>Experties</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_education_content_result as $key => $education_content){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $education_content['passing_year']?></td>
                                        <td><?= $education_content['education_info']?></td>
                                        <td><?= $education_content['experties']?></td>
                                        <td>
                                            <!-- process---1 -->
                                            <!-- <?php if($education_content['status'] == 1){ ?>
                                            <a href="banner_status.php?id=<?= $education_content['id']?>"
                                                class="btn btn-success">Active</a>
                                            <?php }else { ?>
                                            <a href="banner_status.php?id=<?= $education_content['id']?>"
                                                class="btn btn-secondary">Deactive</a>
                                            <?php } ?> -->

                                            <!-- process---2 -->
                                            <a href="education_status.php?id=<?= $education_content['id']?>"
                                                class="btn btn-<?= ($education_content['status'] == 1) ? 'success':'secondary'?>"><?= ($education_content['status'] == 1? 'Active' : 'Deactive') ?></a>

                                        </td>
                                        <td>
                                            <a href="delete_education.php?id=<?=$education_content['id']?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-header">About Image List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_about_image_result as $key => $about_image){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td>
                                            <img width="50"
                                                src="../uploads/about_images/<?=$about_image['about_image']?>" alt="">
                                        </td>
                                        <td>
                                            <!-- process---1 -->
            <!-- <?php if($about_image['status'] == 1){ ?>
                                            <a href="banner_status.php?id=<?= $about_image['id']?>"
                                                class="btn btn-success">Active</a>
                                            <?php }else { ?>
                                            <a href="banner_status.php?id=<?= $about_image['id']?>"
                                                class="btn btn-secondary">Deactive</a>
                                            <?php } ?> -->

            <!-- process---2 -->
            <a href="about_image_status.php?id=<?= $about_image['id']?>"
                class="btn btn-<?= ($about_image['status'] == 1) ? 'success':'secondary'?>"><?= ($about_image['status'] == 1? 'Active' : 'Deactive') ?></a>

            </td>
            <td>
                <a href="delete_about_image.php?id=<?=$about_image['id']?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div> -->
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