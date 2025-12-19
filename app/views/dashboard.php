<?php
$pageTitle = 'Личный кабинет | Astana Medical';
$bodyStyle = 'background-color: #f8fafc;';
$extraStyles = '<style>
        /* Specific Dashboard Styles */
        .dashboard-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
            padding-top: 2rem;
            padding-bottom: 4rem;
        }
        
        @media (max-width: 900px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
        }
        
        .sidebar {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            height: fit-content;
        }
        
        .user-profile {
            text-align: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .nav-item a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 1rem;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-item a:hover, .nav-item a.active {
            background: rgba(37, 99, 235, 0.05);
            color: var(--primary);
        }
        
        .nav-item a.logout {
            color: #ef4444;
        }
        
        .nav-item a.logout:hover {
            background: rgba(239, 68, 68, 0.05);
        }
        
        .dashboard-content h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }
        
        .stat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .appointments-section {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        
        .appointment-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1rem;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            margin-top: 1rem;
        }
        
        .date-badge {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-align: center;
            min-width: 80px;
        }
        
        .date-day {
            font-size: 1.2rem;
            font-weight: 700;
        }
    </style>';

require __DIR__ . '/layouts/header.php';
?>

<!-- Navbar -->
<nav class="navbar" style="background: white; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
    <div class="container nav-content">
        <a href="./" class="brand">
            <i class="fa-solid fa-heart-pulse"></i> Astana Medical
        </a>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <span class="text-muted"><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?></span>
            <div style="width: 32px; height: 32px; background: var(--bg-gradient); border-radius: 50%;"></div>
        </div>
    </div>
</nav>

<div class="container dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="user-profile">
            <div class="user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>
            <h3><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?></h3>
            <p class="text-muted">ID: <?php echo $_SESSION['user']['id'] ?? '000'; ?></p>
        </div>

        <ul class="nav-menu">
            <li class="nav-item"><a href="#" class="active"><i class="fa-solid fa-chart-pie"></i> Обзор</a></li>
            <li class="nav-item"><a href="#"><i class="fa-solid fa-calendar-check"></i> Записи к врачу</a></li>
            <li class="nav-item"><a href="#"><i class="fa-solid fa-file-medical"></i> Мед. карта</a></li>
            <li class="nav-item"><a href="#"><i class="fa-solid fa-flask"></i> Анализы</a></li>
            <li class="nav-item"><a href="#"><i class="fa-solid fa-gear"></i> Настройки</a></li>
            <li class="nav-item" style="margin-top: 1rem;"><a href="./logout" class="logout"><i
                        class="fa-solid fa-arrow-right-from-bracket"></i> Выйти</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-content">
        <h2>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?>! 👋</h2>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>120/80</h3>
                    <p class="text-muted">Давление</p>
                </div>
                <div class="stat-icon" style="background: rgba(37, 99, 235, 0.1); color: var(--primary);">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>76 кг</h3>
                    <p class="text-muted">Вес</p>
                </div>
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                    <i class="fa-solid fa-weight-scale"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>A (II)</h3>
                    <p class="text-muted">Группа крови</p>
                </div>
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                    <i class="fa-solid fa-droplet"></i>
                </div>
            </div>
        </div>

        <div class="appointments-section">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h3>Ближайшие записи</h3>
                <a href="./book" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Записаться</a>
            </div>

            <?php if (empty($appointments)): ?>
                <div style="text-align: center; padding: 2rem; color: var(--text-muted);">
                    <p>У вас пока нет активных записей.</p>
                </div>
            <?php else: ?>
                <?php foreach ($appointments as $app):
                    $date = new DateTime($app['appointment_date']);
                    $isPaid = $app['status'] === 'confirmed';
                    ?>
                    <div class="appointment-card">
                        <div class="date-badge"
                            style="<?php echo $isPaid ? 'background: rgba(16, 185, 129, 0.1); color: #10b981;' : ''; ?>">
                            <div class="date-day"><?php echo $date->format('d'); ?></div>
                            <div style="font-size: 0.8rem;"><?php echo $date->format('M'); ?></div>
                        </div>
                        <div style="flex-grow: 1;">
                            <h4 style="margin-bottom: 0.2rem;"><?php echo htmlspecialchars($app['specialty']); ?></h4>
                            <p class="text-muted" style="font-size: 0.9rem;">
                                <i class="fa-regular fa-clock"></i> <?php echo $date->format('H:i'); ?> -
                                <?php echo htmlspecialchars($app['doctor_name']); ?>
                            </p>
                        </div>
                        <div style="text-align: right;">
                            <span
                                style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem;">
                                <?php echo $app['status'] == 'confirmed' ? 'Подтверждено' : 'Ожидание'; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="appointments-section" style="margin-top: 2rem;">
            <h3>Последние документы</h3>
            <div style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem;">
                <div
                    style="display: flex; justify-content: space-between; padding: 0.8rem; border-bottom: 1px solid #f1f5f9; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <i class="fa-regular fa-file-pdf" style="color: #ef4444; font-size: 1.2rem;"></i>
                        <div>
                            <p style="margin: 0;">Общий анализ крови.pdf</p>
                            <p style="margin: 0; font-size: 0.8rem; color: var(--text-muted);">15 Дек 2023</p>
                        </div>
                    </div>
                    <button style="border: none; background: transparent; color: var(--primary); cursor: pointer;"><i
                            class="fa-solid fa-download"></i></button>
                </div>
                <div
                    style="display: flex; justify-content: space-between; padding: 0.8rem; border-bottom: 1px solid #f1f5f9; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <i class="fa-regular fa-file-lines" style="color: var(--primary); font-size: 1.2rem;"></i>
                        <div>
                            <p style="margin: 0;">Назначение врача.docx</p>
                            <p style="margin: 0; font-size: 0.8rem; color: var(--text-muted);">10 Дек 2023</p>
                        </div>
                    </div>
                    <button style="border: none; background: transparent; color: var(--primary); cursor: pointer;"><i
                            class="fa-solid fa-download"></i></button>
                </div>
            </div>
        </div>
    </main>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>