<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ./');
}

require_once './partials/connection.php';

$name = $reg_no = "";
$errors = [];

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $reg_no = htmlspecialchars($_POST['reg_no']);

    if (empty($name)) {
        $errors['name'] = "Name is required!";
    }

    if (empty($reg_no)) {
        $errors['reg_no'] = "Reg. No. is required!";
    }

    if (count($errors) === 0) {
        $sql = "SELECT * FROM `students` WHERE `reg_no` = '$reg_no'";
        $result = $conn->query($sql);

        if ($result->num_rows === 0) {
            $sql = "INSERT INTO `students`(`name`, `reg_no`) VALUES ('$name', '$reg_no')";

            if ($conn->query($sql)) {
                $success = "Magic has been spelled!";
                $name = $reg_no = "";
            } else {
                $failure = "Magic has become shopper!";
            }
        } else {
            $failure = "Reg. No. already exists!";
        }
    }
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
                            <h1 class="h3 mb-3">Add Student</h1>
                        </div>

                        <div class="col-6 text-end">
                            <a href="./show-students.php" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php require_once './partials/alerts.php' ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control <?php if (isset($errors['name'])) echo 'is-invalid' ?>" id="name" name="name" value="<?php echo $name ?>" placeholder="Student name!">
                                            <?php
                                            if (isset($errors['name'])) { ?>
                                                <div class="text-danger"><?php echo $errors['name'] ?></div>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="reg_no" class="form-label">Reg. no.</label>
                                            <input type="text" class="form-control <?php if (isset($errors['reg_no'])) echo 'is-invalid' ?>" id="reg_no" name="reg_no" value="<?php echo $reg_no ?>" placeholder="Student reg_no!">
                                            <?php
                                            if (isset($errors['reg_no'])) { ?>
                                                <div class="text-danger"><?php echo $errors['reg_no'] ?></div>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div>
                                            <input type="submit" name="submit" class="btn btn-primary">
                                        </div>
                                    </form>
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