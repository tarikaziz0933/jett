<?php
session_start();
require 'db.php';
$select = "SELECT * FROM users";
$select_result = mysqli_query($db_connect, $select);
// print_r($select_result);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Users Informations</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>

                                <?php foreach ($select_result as $key => $user){ ?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td><?=$user['name']?></td>
                                    <td><?=$user['email']?></td>
                                    <td>
                                        <a href="user_edit.php?id=<?=$user['id']?>" class="btn btn-info">Edit</a>

                                        <button name="delete.php?id=<?=$user['id']?>" type="button"
                                            class="btn btn-danger del">Delete</button>
                                    </td>
                                </tr>

                                <?php } ?>

                                <?php if(mysqli_num_rows($select_result)==0){?>
                                <tr>
                                    <td colspan="4" class="text-center">No Data Found</td>
                                </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('.del').click(function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        });
    });
    </script>

    <?php if(isset($_SESSION['delete'])) {?>
    <script>
    Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
    });
    </script>
    <?php } unset($_SESSION['delete']) ?>

    <?php if(isset($_SESSION['update'])) {?>
    <script>
    Swal.fire({
        title: "Updated!",
        text: "<?= $_SESSION['update']?>",
        icon: "success"
    });
    </script>
    <?php } unset($_SESSION['update']) ?>

</body>

</html>