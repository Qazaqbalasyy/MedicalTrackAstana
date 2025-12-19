<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astana Medical | Профессиональная забота</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container nav-content">
            <a href="./" class="brand">
                <i class="fa-solid fa-heart-pulse"></i> Astana Medical
            </a>
            <ul class="nav-links">
                <li><a href="#features" class="nav-link">Функции</a></li>
                <li><a href="#doctors" class="nav-link">Врачи</a></li>
                <li><a href="#about" class="nav-link">О нас</a></li>
            </ul>
            <a href="#" class="btn btn-primary">Кабинет пациента</a>
        </div>
    </nav>

    <!-- Decorative Elements -->
    <!-- <div class="blob blob-1"></div>
    <div class="blob blob-2"></div> -->

    <!-- Hero Section -->
    <section class="hero" style="background: url('public/img/astana-bg.png') no-repeat center center/cover;">
        <div
            style="position: absolute; inset: 0; background: rgba(240, 249, 255, 0.85); backdrop-filter: blur(8px); z-index: 0;">
        </div>
        <div class="container hero-content" style="position: relative; z-index: 1;">
            <div class="hero-text">
                <h1 class="animate-up">Astana Medical<br><span class="text-gradient">Забота о каждом.</span></h1>
                <p class="animate-up delay-1">
                    Современная цифровая клиника в сердце столицы. Ваши медицинские данные, анализы и запись к врачу — в
                    одном приложении.
                </p>
                <div class="hero-buttons animate-up delay-2">
                    <a href="./register" class="btn btn-primary" style="text-decoration: none;">
                        Начать <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                    </a>
                </div>

                <div class="hero-stats animate-up delay-3">
                    <div class="stat-item">
                        <h3 class="text-gradient">10x</h3>
                        <p>Быстрая диагностика</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="text-gradient">24/7</h3>
                        <p>AI Мониторинг</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="text-gradient">1M+</h3>
                        <p>Защищенных записей</p>
                    </div>
                </div>
            </div>

            <div class="hero-visual animate-up delay-2">
                <div class="glass-panel dashboard-preview">
                    <div class="card-header">
                        <div>
                            <h4>Обзор здоровья</h4>
                            <p style="font-size: 0.8rem; color: var(--text-muted);">Сегодня, 20 Дек</p>
                        </div>
                        <i class="fa-solid fa-bell" style="color: var(--primary);"></i>
                    </div>

                    <div class="health-grid">
                        <div class="health-card">
                            <div class="health-icon">
                                <i class="fa-solid fa-heart-crack"></i>
                            </div>
                            <h3>72 <span style="font-size: 0.8rem; color: var(--text-muted);">уд/мин</span></h3>
                            <p style="font-size: 0.8rem;">Пульс</p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: var(--secondary);">
                                <i class="fa-solid fa-droplet"></i>
                            </div>
                            <h3>98 <span style="font-size: 0.8rem; color: var(--text-muted);">%</span></h3>
                            <p style="font-size: 0.8rem;">Кислород</p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: var(--accent);">
                                <i class="fa-solid fa-fire"></i>
                            </div>
                            <h3>1,204</h3>
                            <p style="font-size: 0.8rem;">Калории</p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: #10b981;">
                                <i class="fa-solid fa-moon"></i>
                            </div>
                            <h3>7ч 20м</h3>
                            <p style="font-size: 0.8rem;">Сон</p>
                        </div>
                    </div>

                    <div
                        style="margin-top: 1.5rem; padding: 1rem; background: rgba(255,255,255,0.5); border-radius: 12px; display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 40px; height: 40px; background: var(--bg-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-user-doctor" style="color: var(--primary);"></i>
                        </div>
                        <div>
                            <h5 style="margin:0;">Д-р Елена Соколова</h5>
                            <p style="margin:0; font-size: 0.8rem; color: var(--text-muted);">Прием: 14:00</p>
                        </div>
                        <button
                            style="margin-left: auto; padding: 0.5rem; border-radius: 8px; border: none; background: white; cursor: pointer; color: var(--primary);">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="container">
            <div class="section-title">
                <h2>Наши возможности</h2>
                <p>Мы используем передовые технологии для заботы о вашем здоровье.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-notes-medical"></i>
                    </div>
                    <h3>Электронная карта</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Вся история болезни, анализы и назначения
                        всегда под рукой в защищенном облаке.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3>Онлайн консультации</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Видеосвязь с лучшими специалистами столицы
                        не выходя из дома.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <h3>Мониторинг 24/7</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Подключение умных устройств для постоянного
                        отслеживания жизненных показателей.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h3>Умная диагностика</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">AI-алгоритмы помогают врачам быстрее и
                        точнее ставить диагнозы.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" style="background: white;">
        <div class="container">
            <div class="section-title">
                <h2>Наши специалисты</h2>
                <p>Врачи высшей категории с международным опытом.</p>
            </div>

            <div class="doctors-grid">
                <!-- Doctor 1 -->
                <div class="doctor-card">
                    <div class="doctor-img">
                        <img src="https://img.freepik.com/free-photo/portrait-successful-mid-adult-doctor-with-crossed-arms_1262-12865.jpg"
                            alt="Doctor">
                    </div>
                    <div class="doctor-info">
                        <h3>Д-р Алимжан Сериков</h3>
                        <span class="doctor-specialty">Кардиолог, д.м.н.</span>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">20 лет стажа. Эксперт в области
                            инвазивной кардиологии.</p>
                    </div>
                </div>

                <!-- Doctor 2 -->
                <div class="doctor-card">
                    <div class="doctor-img">
                        <img src="https://img.freepik.com/free-photo/pleased-young-female-doctor-wearing-medical-robe-stethoscope-around-neck-standing-with-closed-posture_409827-254.jpg"
                            alt="Doctor">
                    </div>
                    <div class="doctor-info">
                        <h3>Д-р Елена Соколова</h3>
                        <span class="doctor-specialty">Терапевт</span>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">Специалист по превентивной медицине и
                            диагностике.</p>
                    </div>
                </div>

                <!-- Doctor 3 -->
                <div class="doctor-card">
                    <div class="doctor-img">
                        <img src="https://img.freepik.com/free-photo/medium-shot-scientist-with-stethoscope_23-2148154508.jpg"
                            alt="Doctor">
                    </div>
                    <div class="doctor-info">
                        <h3>Д-р Руслан Маемеров</h3>
                        <span class="doctor-specialty">Невролог</span>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">Эксперт по лечению головных болей и
                            нарушений сна.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-visual">
                    <div class="glass-panel" style="padding: 2rem; transform: rotate(-3deg);">
                        <img src="https://img.freepik.com/free-photo/medical-banner-with-doctor-working-laptop_23-2149611193.jpg"
                            alt="About" style="width: 100%; border-radius: 12px;">
                    </div>
                </div>
                <div class="about-text">
                    <h2>Новый стандарт<br><span class="text-gradient">Медицины в Астане</span></h2>
                    <p>
                        Astana Medical — это первая в Казахстане полностью цифровая экосистема здоровья.
                        Мы объединили передовые технологии Кремниевой долины с традициями отечественной медицины.
                    </p>
                    <p>
                        Наша миссия — сделать качественную медицину доступной, прозрачной и удобной для каждого жителя
                        столицы и всей страны.
                    </p>
                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check"></i> Единый стандарт качества JCI</li>
                        <li><i class="fa-solid fa-circle-check"></i> Собственная лаборатория</li>
                        <li><i class="fa-solid fa-circle-check"></i> Страховые партнеры по всему миру</li>
                    </ul>
                    <a href="#" class="btn btn-primary" style="margin-top: 1rem;">Подробнее о нас</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <div class="brand" style="margin-bottom: 1rem;">
                        <i class="fa-solid fa-heart-pulse"></i> Astana Medical
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Продвигая стандарты здравоохранения в Казахстане с помощью инновационных технологий и заботы о
                        людях.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-telegram"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Пациентам</h4>
                    <ul>
                        <li><a href="#">Найти врача</a></li>
                        <li><a href="#">Записаться на прием</a></li>
                        <li><a href="#">Услуги и цены</a></li>
                        <li><a href="#">Личный кабинет</a></li>
                        <li><a href="#">Вопрос-ответ</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>О клинике</h4>
                    <ul>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Карьера</a></li>
                        <li><a href="#">Партнерам</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Контакты</h4>
                    <ul>
                        <li><i class="fa-solid fa-location-dot" style="width: 20px; color: var(--primary);"></i> Астана,
                            пр. Мангилик Ел, 55</li>
                        <li><i class="fa-solid fa-phone" style="width: 20px; color: var(--primary);"></i> +7 (7172)
                            70-00-00</li>
                        <li><i class="fa-solid fa-envelope" style="width: 20px; color: var(--primary);"></i>
                            info@astanamed.kz</li>
                        <li><i class="fa-solid fa-clock" style="width: 20px; color: var(--primary);"></i> Пн-Вс: 08:00 -
                            20:00</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Astana Medical. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>