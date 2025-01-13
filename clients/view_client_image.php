<?php
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select_client = "SELECT * FROM clients";
$select_client_result = mysqli_query($db_connect, $select_client);
?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">View client</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-header">client List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Clients</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_client_result as $key => $client){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><img class="w-50" src="../uploads/client/<?=$client['client']?>" alt="">
                                        </td>
                                        <td>
                                            <!-- process---2 -->
                                            <a href="client_image_status.php?id=<?= $client['id']?>"
                                                class="btn btn-<?= ($client['status'] == 1) ? 'success':'secondary'?>"><?= ($client['status'] == 1? 'Active' : 'Deactive') ?></a>

                                        </td>
                                        <td>
                                            <a href="delete_client_image.php?id=<?=$client['id']?>"
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
<?php if(isset($_SESSION['limit'])){?>
<script>
Swal.fire({
    title: "oooops!",
    text: "<?= $_SESSION['limit']?>",
    icon: "error"
});
</script>
<?php } unset($_SESSION['limit']) ?>