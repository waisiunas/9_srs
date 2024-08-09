<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once './partials/head.php' ?>

<body>
    <div class="wrapper">
        <?php require_once './partials/sidebar.php' ?>

        <div class="main">
            <?php require_once './partials/topbar.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row">
                        <div class="col-6">
                            <h1 class="h3 mb-3">Students</h1>
                        </div>

                        <div class="col-6 text-end">
                            <a href="" class="btn btn-outline-primary">Add Student</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered m-0">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Name</th>
                                                <th>Reg. No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ali</td>
                                                <td>435</td>
                                                <td>
                                                    <a href="" class="btn btn-primary">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="alert alert-info m-0">No record found!</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php require_once './partials/footer.php' ?>
        </div>
    </div>

    <script src="./assets/js/app.js"></script>

</body>

</html>