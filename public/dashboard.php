<?php
require __DIR__ . '/../src/includes/auth.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - PraktykaFinder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">Praktyka<span>Finder</span></a>
        <nav class="main-nav">
            <a href="favorites.php">Ulubione</a>
            <a href="applications.php">Moje zgloszenia</a>
            <a href="logout.php">Wyloguj</a>
        </nav>
    </div>
</header>

<section class="hero" style="padding-top:48px; text-align:left;">
    <div class="container">
        <h1 style="font-size:28px;">Czesc, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
        <p class="hero-subtitle" style="margin:8px 0 0;">Tu bedzie Twoj panel - ulubione praktyki i zgloszenia.</p>
    </div>
</section>

</body>
</html>