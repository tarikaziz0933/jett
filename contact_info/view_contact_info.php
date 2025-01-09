<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$contact_informations = "SELECT * FROM contact_info";
$contact_informations_result = mysqli_query($db_connect, $contact_informations);
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
                        <div class="card-header">Contact Info List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($contact_informations_result as $key => $info){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $info['address']?></td>
                                        <td><?= $info['number']?></td>
                                        <td><?= $info['email']?></td>
                                        <td>
                                            <a href="delete_contact_info.php?id=<?=$info['id']?>"
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