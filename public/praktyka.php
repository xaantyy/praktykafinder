<?php
require __DIR__ . '/../src/config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM internships WHERE id = ?");
$stmt->execute([$id]);
$internship = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$internship) {
    die('Nie znaleziono praktyki.');
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($internship['company_name']) ?> — PraktykaFinder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <a href="" class="logo">Praktyka<span>Finder</span></a>
            <nav class="main-nav">
                <a href="praktyki.php">Praktyki</a>
                <a href="login.php">Zaloguj się</a>
                <a href="register.php" class="btn btn-primary">Zarejestruj się</a>
            </nav>
        </div>
    </header>

    <section class="internships">
        <div class="container">

            <a href="" style="display:inline-block; margin-bottom:16px; color:var(--color-text-light); text-decoration:none;">&larr; Wróć do listy</a>

            <div class="internship-card" style="max-width:600px;">
                <div class="card-header">
                    <h3><?= htmlspecialchars($internship['company_name']) ?></h3>
                    <?php if ($internship['is_paid']): ?>
                        <span class="badge badge-paid">Płatna</span>
                    <?php else: ?>
                        <span class="badge badge-unpaid">Nieodpłatna</span>
                    <?php endif; ?>
                </div>
                <p class="card-location">📍 <?= htmlspecialchars($internship['city']) ?></p>
                <p class="card-direction"><?= htmlspecialchars($internship['direction']) ?></p>
                <p class="card-hours"><?= (int)$internship['hours'] ?> godzin</p>
                <p style="margin-top:12px;"><?= nl2br(htmlspecialchars($internship['description'])) ?></p>
                <p style="margin-top:12px; font-size:14px; color:var(--color-text-light);">
                    Kontakt: <?= htmlspecialchars($internship['contact']) ?>
                </p>
            </div>

        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2026 PraktykaFinder. Projekt portfolio.</p>
        </div>
    </footer>

</body>
</html>