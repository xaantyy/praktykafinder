<?php
require __DIR__ . '/../src/config/database.php';
$stmt = $pdo->query("SELECT * FROM internships ORDER BY created_at DESC");
$internships = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PraktykaFinder — Znajdź praktykę zawodową</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <a href="/" class="logo">Praktyka<span>Finder</span></a>
            <nav class="main-nav">
                <a href="/praktyki.php">Praktyki</a>
                <a href="/login.php">Zaloguj się</a>
                <a href="/register.php" class="btn btn-primary">Zarejestruj się</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Znajdź swoją praktykę zawodową</h1>
            <p class="hero-subtitle">Przeglądaj, filtruj i śledź oferty praktyk dopasowane do Twojego kierunku.</p>
            <div class="hero-stats">
                <span class="stat-number">3</span> praktyki dostępne teraz
            </div>
        </div>
    </section>

    <section class="filters">
        <div class="container filters-inner">
            <select class="filter-select">
                <option value="">Miasto</option>
                <option value="krakow">Kraków</option>
                <option value="warszawa">Warszawa</option>
            </select>

            <select class="filter-select">
                <option value="">Kierunek</option>
                <option value="programista">Technik Programista</option>
                <option value="informatyk">Technik Informatyk</option>
            </select>

            <select class="filter-select">
                <option value="">Płatność</option>
                <option value="paid">Płatna</option>
                <option value="unpaid">Bezpłatna</option>
            </select>

            <button class="btn btn-primary">Szukaj</button>
        </div>
    </section>

    <section class="internships">
        <div class="container">
            <div class="internships-grid">

    <?php foreach ($internships as $internship): ?>
        <div class="internship-card">
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
            <a href="/praktyka.php?id=<?= (int)$internship['id'] ?>" class="btn btn-outline">Szczegóły</a>
        </div>
    <?php endforeach;?>
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