<?php 
session_start();
require '../dashboard_parts/header.php'
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Banner</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Banner Content</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_banner_post.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" name="descrp" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add Content</button>
                                </div>
                            </form>
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