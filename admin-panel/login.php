<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Travel Lanka</title>

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Corrected CSS Path -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">

    <div class="login-card">
        <!-- Logo / Icon -->
        <div class="login-avatar">
            <i class="fa-solid fa-user-shield"></i>
        </div>

        <h2 class="login-title">Travel Lanka</h2>
        <p class="login-subtitle">Sign in to Admin Dashboard</p>

        <!-- Form redirecting to Dashboard -->
        <form action="index.php" method="POST">
            <div class="login-form-group">
                <label>Username / Email</label>
                <input type="text" name="username" placeholder="admin@travellanka.lk" required>
            </div>

            <div class="login-form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">LOGIN</button>
        </form>
    </div>

</body>
</html>