<?php
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM logos";
$select_result = mysqli_query($db_connect, $select);
?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">View Logo</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-header">Social Icon List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_result as $key => $logo){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><img class="w-50" src="../uploads/logo/<?=$logo['logo']?>" alt=""></td>
                                        <td>
                                            <!-- process---2 -->
                                            <a href="logo_status.php?id=<?= $logo['id']?>"
                                                class="btn btn-<?= ($logo['status'] == 1) ? 'success':'secondary'?>"><?= ($logo['status'] == 1? 'Active' : 'Deactive') ?></a>

                                        </td>
                                        <td>
                                            <a href="delete_logo.php?id=<?=$logo['id']?>"
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


        </div>
    </div>
</div>

<?php 
require '../dashboard_parts/footer.php'
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