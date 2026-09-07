<?php
session_start();
require __DIR__ . '/../src/config/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password_hash'])) {
        $errors[] = 'Nieprawidłowy email lub hasło.';
    } else {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        header('Location: dashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie — PraktykaFinder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <a href="index.php" class="logo">Praktyka<span>Finder</span></a>
            <nav class="main-nav">
                <a href="praktyki.php">Praktyki</a>
                <a href="register.php">Zarejestruj się</a>
            </nav>
        </div>
    </header>

    <section class="hero" style="padding-top:48px;">
        <div class="container" style="max-width:400px;">

            <h1 style="font-size:28px; margin-bottom:24px;">Zaloguj się</h1>

            <?php if (!empty($errors)): ?>
                <div style="background:#FEF2F2; border:1px solid #FCA5A5; color:#991B1B; padding:12px; border-radius:8px; margin-bottom:16px;">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" style="text-align:left; display:flex; flex-direction:column; gap:14px;">

                <div>
                    <label>Email</label><br>
                    <input type="email" name="email" required style="width:100%; padding:10px; border:1px solid var(--color-border); border-radius:8px;">
                </div>

                <div>
                    <label>Hasło</label><br>
                    <input type="password" name="password" required style="width:100%; padding:10px; border:1px solid var(--color-border); border-radius:8px;">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:8px;">Zaloguj się</button>

            </form>

        </div>
    </section>

</body>
</html>