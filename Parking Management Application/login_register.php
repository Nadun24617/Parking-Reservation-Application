<?php
session_start();
require 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            if ($stmt->execute([$email, $hashed_password])) {
                $success = "Registration successful. You can now log in.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } elseif (isset($_POST['login'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            if ($_POST['redirect'] == 'reserve') {
                header('Location: reserve.php');
            } else {
                header('Location: cus-details.php');
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #fff;
            font-family: 'Nunito', sans-serif;
            color: #333;
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            background: #f4f4f4;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary, .btn-secondary {
            background: #007bff;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
            border-radius: 50px;
            padding: 10px 30px;
            color: #fff;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .nav-tabs .nav-link {
            color: #007bff;
            transition: color 0.3s;
        }
        .nav-tabs .nav-link:hover {
            color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        header, footer {
            width: 100%;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        header {
            top: 0;
            background: #333;
            color: #fff;
        }
        footer {
            bottom: 0;
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .nav-item a {
            color: #fff;
            font-weight: bold;
            padding: 15px 20px;
            transition: all 0.3s;
        }
        .nav-item a:hover {
            background: #007bff;
            border-radius: 50px;
        }
        .btn-reserve, .btn-login {
            margin-top: 20px;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: #007bff;
            color: #fff;
        }
        .btn-reserve::before, .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.5s ease;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }
        .btn-reserve:hover::before, .btn-login:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }
        .btn-reserve:hover, .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <?php include("components/header.php")?>
    </header>
    <div class="container">
        <h1 class="text-center">Customer Registration/Login</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                <form action="login_register.php" method="post">
                    <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_GET['redirect'] ?? ''); ?>">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
            <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form action="login_register.php" method="post">
                    <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_GET['redirect'] ?? ''); ?>">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-secondary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php include("components/footer.php")?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>