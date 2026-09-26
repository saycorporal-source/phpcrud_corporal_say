<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Milk Tea Shop Management</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff5fa;
        }

        .navbar {
            background: linear-gradient(135deg, #e85d9a, #d94787);
        }

        .brand {
            font-family: 'Pacifico', cursive;
            font-size: 25px;
        }

        .hero {
            background: linear-gradient(135deg, #ffd6e8, #ffc1dd);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-family: 'Pacifico', cursive;
            color: #c83c78;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
        }

        .table thead {
            background: #e85d9a;
            color: white;
        }

        .btn-pink {
            background: #d94787;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background: #bd326d;
            color: white;
        }

        .logout-btn {
            border: 1px solid white;
            color: white;
        }

        .logout-btn:hover {
            background: white;
            color: #d94787;
        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand brand">
            🧋 Milk Tea Shop
        </a>

        <div class="d-flex align-items-center gap-3">

            <a
                href="logout.php"
                class="btn logout-btn btn-sm"
                onclick="return confirm('Are you sure you want to logout?')"
            >
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>

        </div>

    </div>

</nav>


<!-- MAIN CONTENT -->
<div class="container py-5">

    <!-- HERO -->
    <div class="hero">

        <h1>Student Order Reservation Information</h1>

        <p class="mb-0">
            Manage student who reserve their orders to easily call their names when their orders are ready. You can add, edit, or delete student information as needed.
        </p>

    </div>


    <!-- STUDENT CARD -->
    <div class="card">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h3 class="fw-bold mb-0">
                    <i class="bi bi-people-fill"></i>
                    Student List
                </h3>

                <button
                    class="btn btn-pink"
                    data-bs-toggle="modal"
                    data-bs-target="#addModal"
                >
                    <i class="bi bi-person-plus-fill"></i>
                    Add Student
                </button>

            </div>


            <!-- TABLE -->
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>First Name</th>

                            <th>Last Name</th>

                            <th class="text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $query = "SELECT * FROM students ORDER BY id ASC";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                    ?>

                    <tr>

                        <td>
                            <?php echo $row['id']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['firstname']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['lastname']); ?>
                        </td>

                        <td class="text-center">

                            <a
                                href="edit.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-success btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <a
                                href="delete.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this student?')"
                            >
                                <i class="bi bi-trash"></i>
                                Delete
                            </a>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                    ?>

                    <tr>

                        <td colspan="4" class="text-center text-muted py-4">

                            No students found.

                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<!-- ADD STUDENT MODAL -->

<div
    class="modal fade"
    id="addModal"
    tabindex="-1"
>

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-person-plus"></i>
                    Add Student
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>

            <form action="insert.php" method="POST">

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="firstname"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="lastname"
                            class="form-control"
                            required
                        >

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn btn-pink"
                    >
                        <i class="bi bi-save"></i>
                        Save Student
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>