<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Milk Tea Shop - Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffd6e8, #ffb6d9, #ffcce6);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 400px;
            background: white;
            padding: 40px 35px;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(185, 70, 120, 0.20);
        }

        .logo {
            font-size: 55px;
            text-align: center;
        }

        .title {
            font-family: 'Pacifico', cursive;
            color: #d94f8a;
            text-align: center;
            font-size: 38px;
        }

        .subtitle {
            text-align: center;
            color: #9b7184;
            font-size: 13px;
            margin-bottom: 30px;
        }

        .form-control {
            border: 2px solid #f5c4d8;
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: #df6b9d;
            box-shadow: 0 0 0 3px rgba(223,107,157,.12);
        }

        .login-btn {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 13px;
            background: linear-gradient(135deg, #e85d9a, #d94787);
            color: white;
            font-weight: 700;
        }

        .login-btn:hover {
            background: #c83c78;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">🧋</div>

    <h1 class="title">Milk Tea</h1>

    <p class="subtitle">
        Welcome back! Please login to continue.
    </p>

    <form action="check.php" method="POST">

        <div class="mb-3">
            <label class="form-label fw-semibold">Username</label>
            <input
                type="text"
                name="username"
                class="form-control"
                placeholder="Enter your username"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>

            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Enter your password"
                required
            >
        </div>

        <div class="form-check mb-4">
            <input
                class="form-check-input"
                type="checkbox"
                id="showPassword"
            >

            <label class="form-check-label" for="showPassword">
                Show Password
            </label>
        </div>

        <button type="submit" class="login-btn">
            LOGIN
        </button>

    </form>

</div>

<script>
document.getElementById("showPassword").addEventListener("change", function() {

    let password = document.getElementById("password");

    password.type = this.checked ? "text" : "password";

});
</script>

</body>
</html>