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

                <div class="internship-card">
                    <div class="card-header">
                        <h3>Software House Kraków</h3>
                        <span class="badge badge-unpaid">Nieodpłatna</span>
                    </div>
                    <p class="card-location">📍 Kraków</p>
                    <p class="card-direction">Technik Programista</p>
                    <div class="card-tags">
                        <span class="tag">Python</span>
                        <span class="tag">SQL</span>
                    </div>
                    <p class="card-hours">140 godzin</p>
                    <a href="/praktyka.php?id=1" class="btn btn-outline">Szczegóły</a>
                </div>

                <div class="internship-card">
                    <div class="card-header">
                        <h3>IT Support Kraków</h3>
                        <span class="badge badge-unpaid">Nieodpłatna</span>
                    </div>
                    <p class="card-location">📍 Kraków</p>
                    <p class="card-direction">Technik Informatyk</p>
                    <div class="card-tags">
                        <span class="tag">Windows</span>
                        <span class="tag">Networking</span>
                    </div>
                    <p class="card-hours">140 godzin</p>
                    <a href="/praktyka.php?id=2" class="btn btn-outline">Szczegóły</a>
                </div>

                <div class="internship-card">
                    <div class="card-header">
                        <h3>WebDev Studio</h3>
                        <span class="badge badge-paid">Płatna</span>
                    </div>
                    <p class="card-location">📍 Kraków</p>
                    <p class="card-direction">Technik Programista</p>
                    <div class="card-tags">
                        <span class="tag">JavaScript</span>
                        <span class="tag">Git</span>
                    </div>
                    <p class="card-hours">140 godzin</p>
                    <a href="/praktyka.php?id=3" class="btn btn-outline">Szczegóły</a>
                </div>

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