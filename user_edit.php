<?php
session_start();
require "db.php";
$id = $_GET["id"];

$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);

// echo $after_assoc['name'];


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit User</h3>
                        </div>


                        <div class="card-body">
                            <form action="update_user.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Your Name</label>
                                    <input type="hidden" value="<?=$after_assoc['id']?>" class="form-control" name="id"
                                        required>
                                    <input type="text" value="<?=$after_assoc['name']?>" class="form-control"
                                        name="name" required>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Your Email</label>
                                    <input type="email" value="<?=$after_assoc['email']?>" class="form-control"
                                        name="email" required>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Your Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(isset($_SESSION['update'])) { ?>
    <script>
    alert('hvhjvjh')
    Swal.fire({
        position: "top-end",
        icon: "update",
        title: '<?= $_SESSION['update']?>',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } unset($_SESSION['update']) ?>


</body>

</html>