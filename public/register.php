<?php
require __DIR__ . '/../src/config/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($name === '') {
        $errors[] = 'Podaj imię.';
    }
    if ($email === '') {
        $errors[] = 'Podaj email.';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Hasło musi mieć co najmniej 6 znaków.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = 'Ten email jest już zajęty.';
        }
    }

   if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare(
            "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)"
        );
        $stmt->execute([$name, $email, $hash]);

        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja — PraktykaFinder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <a href="index.php" class="logo">Praktyka<span>Finder</span></a>
            <nav class="main-nav">
                <a href="praktyki.php">Praktyki</a>
                <a href="login.php">Zaloguj się</a>
            </nav>
        </div>
    </header>

    <section class="hero" style="padding-top:48px;">
        <div class="container" style="max-width:400px;">

            <h1 style="font-size:28px; margin-bottom:24px;">Załóż konto</h1>

            <?php if (!empty($errors)): ?>
                <div style="background:#FEF2F2; border:1px solid #FCA5A5; color:#991B1B; padding:12px; border-radius:8px; margin-bottom:16px;">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" style="text-align:left; display:flex; flex-direction:column; gap:14px;">

                <div>
                    <label>Imię</label><br>
                    <input type="text" name="name" required style="width:100%; padding:10px; border:1px solid var(--color-border); border-radius:8px;">
                </div>

                <div>
                    <label>Email</label><br>
                    <input type="email" name="email" required style="width:100%; padding:10px; border:1px solid var(--color-border); border-radius:8px;">
                </div>

                <div>
                    <label>Hasło</label><br>
                    <input type="password" name="password" required style="width:100%; padding:10px; border:1px solid var(--color-border); border-radius:8px;">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:8px;">Zarejestruj się</button>

            </form>

        </div>
    </section>

</body>
</html>