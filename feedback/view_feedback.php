<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_feedback = "SELECT * FROM feedbacks";
$select_feedback_res = mysqli_query($db_connect, $select_feedback);

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
                <div class="col-lg-10 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Feedback List <a href="add_feedback.php"> <button
                                        class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i>
                                        Add Feedback </button> </a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Descrip</th>
                                        <th>Iamge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_feedback_res as $key=>$feedback){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$feedback['name']?></td>
                                        <td><?=$feedback['designation']?></td>
                                        <td><?=$feedback['descrp']?></td>
                                        <td>
                                            <img width="100" height="100"
                                                src="../uploads/feedback/<?=$feedback['image']?>" alt="">
                                        </td>
                                        <td>
                                            <a href="feedback_edit.php?id=<?=$feedback['id'];?>"> <button
                                                    class="btn btn-info mr-2" name="">Edit</button> </a>
                                            <button class="btn btn-danger feedback_delete"
                                                name="feedback_delete.php?id=<?=$feedback['id'];?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_feedback_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#"
                                                    class="alert-link">Add Feedback</a>!!!!!!!
                                            </div>
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
<!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_parts/footer.php'; ?>
<?php
 if(isset($_SESSION['feedback_delete'])){
     ?>
<script>
Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: "<?=$_SESSION['feedback_delete']?>",
    showConfirmButton: false,
    timer: 1500
})
</script>
<?php
 }unset($_SESSION['feedback_delete']);
?>
<script>
$('.feedback_delete').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "feedback Wants Delete!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var link = $(this).attr('name');
            window.location.href = link;
        }
    })
});
</script>