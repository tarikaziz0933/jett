<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select_banner_content = "SELECT * FROM banner_contents";
$select_banner_content_result = mysqli_query($db_connect, $select_banner_content);

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
                        <div class="card-header">Banner Content List</div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Sub Title</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_banner_content_result as $key => $banner_content){ ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $banner_content['sub_title']?></td>
                                        <td><?= $banner_content['title']?></td>
                                        <td><?= $banner_content['descrp']?></td>
                                        <td>
                                            <a href="delete_banner.php?<?=$banner_content['id']?>"
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