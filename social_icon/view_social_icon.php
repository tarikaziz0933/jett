<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select_icon = "SELECT * FROM social_link";
$select_icon_result = mysqli_query($db_connect, $select_icon);
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
                        <div class="card-header">Social Icon List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Icon</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_icon_result as $key => $icon){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $icon['icon_class']?></td>
                                        <td><?= $icon['link']?></td>
                                        <td>
                                            <!-- process---2 -->
                                            <a href="banner_status.php?id=<?= $icon['id']?>"
                                                class="btn btn-<?= ($icon['status'] == 1) ? 'success':'secondary'?>"><?= ($icon['status'] == 1? 'Active' : 'Deactive') ?></a>

                                        </td>
                                        <td>
                                            <a href="delete_banner.php?id=<?=$icon['id']?>"
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