<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select_service = "SELECT * FROM services";
$select_service_result = mysqli_query($db_connect, $select_service);
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
                        <div class="card-header">Service List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_service_result as $key => $service){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><i class="fa <?= $service['service_icon']?>"></i></td>
                                        <td><?= $service['title']?></td>
                                        <td><?= $service['decrp']?></td>
                                        <td>
                                            <!-- process---2 -->
                                            <a href="service_status.php?id=<?= $service['id']?>"
                                                class="btn btn-<?= ($service['status'] == 1) ? 'success':'secondary'?>"><?= ($service['status'] == 1? 'Active' : 'Deactive') ?></a>

                                        </td>
                                        <td>
                                            <a href="delete_service.php?id=<?=$service['id']?>"
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

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php 
require '../dashboard_parts/footer.php'
?>
<?php if(isset($_SESSION['limit'])){?>
<script>
Swal.fire({
    title: "oooops!",
    text: "<?= $_SESSION['limit']?>",
    icon: "error"
});
</script>
<?php } unset($_SESSION['limit']) ?>