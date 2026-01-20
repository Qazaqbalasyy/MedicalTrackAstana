<?php
$pageTitle = 'Личный кабинет | Astana Medical';
$bodyStyle = '';
$extraStyles = <<<EOD
<style>
        
        :root {
            --dash-bg: #f8fafc; 
            --dash-card: rgba(255, 255, 255, 0.7);
            --dash-border: rgba(255, 255, 255, 0.4);
            --dash-text: #0f172a;
            --dash-shadow: 0 8px 32px rgba(0, 180, 216, 0.08); 
            --dash-shadow-hover: 0 16px 48px rgba(0, 180, 216, 0.15);
        }

        [data-theme="dark"] {
            --dash-bg: #020617;
            --dash-card: rgba(30, 41, 59, 0.6);
            --dash-border: rgba(255, 255, 255, 0.08);
            --dash-text: #f1f5f9;
            --dash-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        body {
            background-color: var(--dash-bg) !important;
            color: var(--dash-text) !important;
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        
        .dashboard-container {
            display: grid;
            grid-template-columns: 280px 1fr 380px;
            gap: 2rem;
            padding-top: 150px; 
            padding-bottom: 4rem;
            max-width: 1750px;
        }

        .side-panel {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .body-scan-card {
            background: var(--dash-card);
            border-radius: 24px;
            padding: 1.5rem;
            box-shadow: var(--dash-shadow);
            border: 1px solid var(--dash-border);
            height: 600px;
            position: sticky;
            top: 140px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .body-canvas-container {
            flex-grow: 1;
            position: relative;
            cursor: grab;
        }

        .scan-overlay-info {
            position: absolute;
            top: 1rem;
            left: 1rem;
            pointer-events: none;
            z-index: 5;
        }

        .scan-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 180, 216, 0.1);
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid rgba(0, 180, 216, 0.2);
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {
            0% { box-shadow: 0 0 0 0 rgba(0, 180, 216, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(0, 180, 216, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 180, 216, 0); }
        }

        .hotspot-info {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--dash-border);
        }

        .hotspot-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            font-size: 0.9rem;
        }

        .hotspot-label { color: var(--text-muted); }
        .hotspot-value { font-weight: 600; color: var(--dash-text); }
        .hotspot-value.ok { color: #10b981; }
        .hotspot-value.check { color: #f59e0b; }

        @media (max-width: 1400px) {
            .dashboard-container {
                grid-template-columns: 280px 1fr;
            }
            .side-panel { display: none; }
        }
        
        @media (max-width: 991px) {
            .dashboard-container {
                grid-template-columns: 1fr;
                padding-top: 140px;
            }
        }
        
        
        .sidebar {
            background: var(--dash-card);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            border-radius: 24px;
            padding: 2rem 1.5rem;
            box-shadow: var(--dash-shadow);
            height: fit-content;
            border: 1px solid var(--dash-border);
            position: sticky;
            top: 140px;
            transition: all 0.3s ease;
        }

        .sidebar:hover {
            border-color: rgba(0, 180, 216, 0.3);
            box-shadow: var(--dash-shadow-hover);
        }
        
        .user-profile {
            text-align: center;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--dash-border);
            margin-bottom: 2rem;
        }
        
        .user-avatar {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 20px rgba(0, 180, 216, 0.3);
            border: 4px solid var(--dash-card);
        }
        
        
        .nav-menu {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }
        
        .nav-item a {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1rem 1.2rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-weight: 500;
        }
        
        .nav-item a:hover {
            background: rgba(0, 0, 0, 0.02);
            color: var(--primary);
            transform: translateX(5px);
        }
        
        .nav-item a.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 8px 20px rgba(0, 180, 216, 0.25);
            transform: translateX(5px);
        }

        .nav-item a.logout {
            color: #ef4444;
            margin-top: 2rem;
            background: rgba(239, 68, 68, 0.05);
        }
        
        .nav-item a.logout:hover {
            background: rgba(239, 68, 68, 0.1);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.1);
        }
        
        
        .dashboard-content h2 {
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            background-clip: text;
        }
        
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            margin-bottom: 2.5rem;
        }
        
        .stat-card {
            background: var(--dash-card);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1.8rem;
            border-radius: 24px;
            box-shadow: var(--dash-shadow);
            border: 1px solid var(--dash-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--dash-shadow-hover);
        }
        
        .stat-info h3 {
            font-size: 2.2rem;
            margin-bottom: 0.2rem;
            color: var(--text-main);
            font-weight: 800;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        
        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .chart-card, .appointments-section {
            background: var(--dash-card);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--dash-shadow);
            border: 1px solid var(--dash-border);
            transition: all 0.3s ease;
        }
        
        
        .appointment-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
            border: 1px solid var(--dash-border);
            border-radius: 20px;
            margin-top: 1rem;
            background: rgba(248, 250, 252, 0.5);
            transition: all 0.3s;
        }

        .appointment-card:hover {
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transform: scale(1.02);
            border-color: transparent;
        }

        [data-theme='dark'] .appointment-card {
            background: rgba(15, 23, 42, 0.5);
        }
        [data-theme='dark'] .appointment-card:hover {
            background: var(--dash-card);
        }
        
        .date-badge {
            background: var(--dash-bg);
            padding: 0.8rem 1.2rem;
            border-radius: 16px;
            text-align: center;
            min-width: 80px;
        }

        
        .tab-content {
            display: none;
            animation: fadeSlideUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .tab-content.active { display: block; }
        
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        
        @media (max-width: 500px) {
            .analytics-grid { grid-template-columns: 1fr; }
            .dashboard-container { padding-top: 120px; }
            .stat-info h3 { font-size: 1.8rem; }
        }
        
        
        .ticket-card {
            background: var(--dash-card);
            border-radius: 24px;
            box-shadow: var(--dash-shadow);
            display: flex;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid var(--dash-border);
        }
        .ticket-card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: var(--dash-shadow-hover);
        }
        .ticket-left {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 2px dashed var(--dash-border);
            position: relative;
        }
        .ticket-left::after, .ticket-left::before {
            content: '';
            position: absolute;
            right: -12px;
            width: 24px;
            height: 24px;
            background: var(--dash-bg);
            border-radius: 50%;
            border: 1px solid var(--dash-border); 
             box-shadow: inset 0 0 0 1px rgba(0,0,0,0.05);
        }
        .ticket-left::before { top: -12px; }
        .ticket-left::after { bottom: -12px; }

        [data-theme='dark'] .ticket-left::after, 
        [data-theme='dark'] .ticket-left::before { 
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.05);
        }

        .ticket-right {
            width: 220px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(0, 180, 216, 0.03);
            text-align: center;
            border-left: 2px dashed transparent; 
        }
        .ticket-row {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }
        .ticket-col {
            min-width: 120px;
        }
        .ticket-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
            display: block;
            font-weight: 600;
        }
        .ticket-value {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dash-text);
        }
        .ticket-value.highlight {
            color: var(--primary);
        }
        .qr-code-box {
            background: white;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
        .qr-code {
            width: 100px;
            height: 100px;
            background-image: url('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=AstanaMedicalTicket');
            background-size: cover;
        }
        
        
        .ai-status-dot {
            width: 10px; height: 10px; background: #10b981; border-radius: 50%;
            box-shadow: 0 0 10px #10b981; animation: pulse-status 2s infinite;
        }
        @keyframes pulse-status { 0%, 100% { opacity: 0.5; } 50% { opacity: 1; } }

        .ai-wave-container {
            display: none; height: 20px; align-items: center; gap: 3px; margin: 10px 0;
        }
        .ai-wave-container.active { display: flex; }
        .ai-wave-container span {
            width: 3px; height: 100%; background: var(--primary); border-radius: 3px;
            animation: wave 1s ease-in-out infinite;
        }
        .ai-wave-container span:nth-child(2) { animation-delay: 0.2s; }
        .ai-wave-container span:nth-child(3) { animation-delay: 0.4s; }
        .ai-wave-container span:nth-child(4) { animation-delay: 0.6s; }
        @keyframes wave { 0%, 100% { height: 5px; } 50% { height: 20px; } }

        .ai-chat-widget {
            position: fixed; bottom: 30px; right: 30px; width: 350px; height: 450px;
            z-index: 2000; border-radius: 24px; display: none; flex-direction: column;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3); transform: translateY(20px);
            opacity: 0; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .ai-chat-widget.active { display: flex; transform: translateY(0); opacity: 1; }
        .chat-header { padding: 1.2rem; border-bottom: 1px solid var(--dash-border); display: flex; justify-content: space-between; align-items: center; font-weight: 600; }
        .chat-messages { flex-grow: 1; padding: 1rem; overflow-y: auto; display: flex; flex-direction: column; gap: 10px; }
        .message { padding: 0.8rem 1rem; border-radius: 16px; font-size: 0.85rem; max-width: 85%; line-height: 1.4; border: 1px solid rgba(255,255,255,0.05); }
        .message.ai { background: rgba(0, 180, 216, 0.1); color: var(--dash-text); align-self: flex-start; border-bottom-left-radius: 4px; }
        .message.user { background: var(--primary); color: white; align-self: flex-end; border-bottom-right-radius: 4px; border: none; }
        .chat-input-area { padding: 1rem; border-top: 1px solid var(--dash-border); display: flex; gap: 10px; }
        .chat-input-area input { flex-grow: 1; background: var(--dash-bg); border: 1px solid var(--dash-border); color: var(--dash-text); padding: 0.6rem 1rem; border-radius: 12px; outline: none; }
        .chat-input-area button { background: var(--primary); color: white; border: none; width: 40px; height: 40px; border-radius: 12px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: transform 0.2s; }
        .chat-input-area button:hover { transform: scale(1.05); }
    </style>
EOD;

require __DIR__ . "/layouts/header.php";
?>


<nav class="navbar" style="background: var(--dash-card); border-bottom: 1px solid var(--dash-border);">
    <div class="container nav-content">
        <a href="./" class="brand">
            <i class="fa-solid fa-heart-pulse"></i> Astana Medical
        </a>
        <div style="display: flex; gap: 1rem; align-items: center;">
            
            <div class="theme-switch-wrapper" style="margin-right: 1rem;">
                <label class="theme-switch" for="theme-toggle-check">
                    <input type="checkbox" id="theme-toggle-check" />
                    <div class="slider round">
                        <i class="fa-solid fa-sun"></i>
                        <i class="fa-solid fa-moon"></i>
                    </div>
                </label>
            </div>

            <button id="exportBtn" class="btn desktop-only"
                style="background: var(--primary); color: white; padding: 0.6rem 1.2rem; font-size: 0.85rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 180, 216, 0.2);">
                <i class="fa-solid fa-file-export" style="margin-right: 8px;"></i> Экспортировать отчет
            </button>
            <span
                style="color: var(--dash-text); font-size: 0.9rem; font-weight: 600;"><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?></span>
            <div
                style="width: 35px; height: 35px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 50%; border: 2px solid var(--dash-border);">
            </div>
        </div>
    </div>
</nav>


<div id="welcomeToast" class="notification-toast">
    <div class="toast-icon">
        <i class="fa-solid fa-bell"></i>
    </div>
    <div>
        <h4 style="margin: 0; font-size: 0.9rem;">Напоминание</h4>
        <p style="margin: 0; font-size: 0.8rem; color: var(--text-muted);">Прием у кардиолога через 2 дня</p>
    </div>
</div>


<div id="exportOverlay"
    style="position: fixed; inset: 0; background: rgba(0,0,0,0.8); z-index: 2000; display: none; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
    <div
        style="background: var(--dash-card); padding: 3rem; border-radius: 24px; text-align: center; max-width: 400px; width: 90%;">
        <div id="exportSpinner" style="font-size: 3rem; color: var(--primary); margin-bottom: 1.5rem;">
            <i class="fa-solid fa-circle-notch fa-spin"></i>
        </div>
        <div id="exportSuccess" style="font-size: 3rem; color: #10b981; margin-bottom: 1.5rem; display: none;">
            <i class="fa-solid fa-check-circle"></i>
        </div>
        <h3 id="exportText" style="margin-bottom: 0.5rem; color: var(--dash-text);">Генерация PDF отчета...</h3>
        <p id="exportSub" style="color: var(--text-muted);">Пожалуйста, подождите, собираем вашу историю болезней и
            анализы.</p>
        <button id="closeExport" class="btn btn-primary" style="margin-top: 2rem; width: 100%; display: none;">Скачать
            файл</button>
    </div>
</div>

<div class="container dashboard-container">
    
    <aside class="sidebar">
        <div class="user-profile">
            <div class="user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>
            <h3><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?></h3>
            <p class="text-muted">ID: <?php echo $_SESSION['user']['id'] ?? '000'; ?></p>
        </div>

        <ul class="nav-menu" id="dashboardTabs">
            <li class="nav-item"><a href="#" class="active" data-tab="overview"><i class="fa-solid fa-chart-pie"></i>
                    Обзор</a></li>
            <li class="nav-item"><a href="#" data-tab="appointments"><i class="fa-solid fa-calendar-check"></i> Записи к
                    врачу</a></li>
            <li class="nav-item"><a href="#" data-tab="medical-card"><i class="fa-solid fa-file-medical"></i> Мед.
                    карта</a></li>
            <li class="nav-item"><a href="#" data-tab="analysis"><i class="fa-solid fa-flask"></i> Анализы</a></li>
            <li class="nav-item"><a href="#" data-tab="settings"><i class="fa-solid fa-gear"></i> Настройки</a></li>
            <li class="nav-item" style="margin-top: 1rem;"><a href="./logout" class="logout"><i
                        class="fa-solid fa-arrow-right-from-bracket"></i> Выйти</a></li>
        </ul>
    </aside>

    
    <main class="dashboard-content">
        <h2>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?>! 👋</h2>

        
        <div id="tab-overview" class="tab-content active">
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

            <div class="analytics-grid">
                <div class="chart-card">
                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3><i class="fa-solid fa-heart-pulse" style="color: var(--primary); margin-right: 10px;"></i>
                            Динамика пульса</h3>
                        <span style="font-size: 0.8rem; color: #10b981; font-weight: 600;">В норме</span>
                    </div>
                    <div style="height: 250px;">
                        <canvas id="pulseChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3><i class="fa-solid fa-weight-scale" style="color: #10b981; margin-right: 10px;"></i>
                            Контроль
                            веса</h3>
                        <span style="font-size: 0.8rem; color: #3b82f6; font-weight: 600;">-1.5 кг за месяц</span>
                    </div>
                    <div style="height: 250px;">
                        <canvas id="weightChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="appointments-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h3>Последние документы</h3>
                </div>
                <div style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem;">
                    <div
                        style="display: flex; justify-content: space-between; padding: 1rem; border-bottom: 1px solid var(--dash-border); align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-regular fa-file-pdf" style="color: #ef4444; font-size: 1.2rem;"></i>
                            <div>
                                <p style="margin: 0; font-weight: 600;">Общий анализ крови.pdf</p>
                                <p style="margin: 0; font-size: 0.8rem; color: var(--text-muted);">15 Дек 2023</p>
                            </div>
                        </div>
                        <button class="btn download-btn"
                            style="border: none; background: transparent; color: var(--primary); cursor: pointer;"><i
                                class="fa-solid fa-download"></i>
                            <div class="download-progress"></div>
                        </button>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; padding: 1rem; border-bottom: 1px solid var(--dash-border); align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-regular fa-file-lines" style="color: var(--primary); font-size: 1.2rem;"></i>
                            <div>
                                <p style="margin: 0; font-weight: 600;">Назначение врача.docx</p>
                                <p style="margin: 0; font-size: 0.8rem; color: var(--text-muted);">10 Дек 2023</p>
                            </div>
                        </div>
                        <button class="btn download-btn"
                            style="border: none; background: transparent; color: var(--primary); cursor: pointer;"><i
                                class="fa-solid fa-download"></i>
                            <div class="download-progress"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="tab-appointments" class="tab-content">
            <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
                <h2 style="margin: 0;">Ваши Талоны</h2>
                <a href="./book" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Новая запись</a>
            </div>

            <?php if (empty($appointments)): ?>
                <div style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    <i class="fa-solid fa-ticket" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                    <p>У вас пока нет активных талонов.</p>
                </div>
            <?php else: ?>
                <?php foreach ($appointments as $app):
                    $date = new DateTime($app['appointment_date']);
                    ?>
                    
                    <div class="ticket-card animate-up">
                        <div class="ticket-left">
                            <div class="ticket-row">
                                <div class="ticket-col">
                                    <span class="ticket-label">Пациент</span>
                                    <span
                                        class="ticket-value"><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Пациент'); ?></span>
                                </div>
                                <div class="ticket-col">
                                    <span class="ticket-label">Врач</span>
                                    <span
                                        class="ticket-value highlight"><?php echo htmlspecialchars($app['doctor_name']); ?></span>
                                </div>
                            </div>
                            <div class="ticket-row">
                                <div class="ticket-col">
                                    <span class="ticket-label">Специальность</span>
                                    <span class="ticket-value"><?php echo htmlspecialchars($app['specialty']); ?></span>
                                </div>
                                <div class="ticket-col">
                                    <span class="ticket-label">Дата</span>
                                    <span class="ticket-value"><?php echo $date->format('d M Y'); ?></span>
                                </div>
                                <div class="ticket-col">
                                    <span class="ticket-label">Время</span>
                                    <span class="ticket-value"><?php echo $date->format('H:i'); ?></span>
                                </div>
                            </div>
                            <div style="margin-top: auto; padding-top: 1rem; border-top: 1px dotted var(--dash-border);">
                                <span style="font-size: 0.85rem; color: var(--text-muted);">* Пожалуйста, приходите за 10 минут
                                    до начала приема.</span>
                            </div>
                        </div>
                        <div class="ticket-right">
                            <div class="qr-code-box">
                                <div class="qr-code"></div>
                            </div>
                            <span class="ticket-label">Кабинет</span>
                            <span class="ticket-value" style="font-size: 1.5rem; margin-bottom: 0.5rem;">204</span>
                            <span
                                style="font-size: 0.8rem; color: #10b981; font-weight: 600; background: rgba(16, 185, 129, 0.1); padding: 4px 10px; border-radius: 20px;">
                                <?php echo $app['status'] == 'confirmed' ? 'Подтверждено' : 'Ожидание'; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        
        <div id="tab-medical-card" class="tab-content">
            <div class="appointments-section" style="text-align:center; padding: 5rem;">
                <i class="fa-solid fa-lock" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
                <h3>Раздел в разработке</h3>
                <p class="text-muted">Этот раздел будет доступен после полной верификации вашей учетной записи.</p>
            </div>
        </div>

        <div id="tab-analysis" class="tab-content">
            <div class="appointments-section" style="text-align:center; padding: 5rem;">
                <i class="fa-solid fa-flask-vial" style="font-size: 3rem; color: #10b981; margin-bottom: 1rem;"></i>
                <h3>Результаты анализов</h3>
                <p class="text-muted">Новых результатов за последние 30 дней не найдено.</p>
            </div>
        </div>

        
        <div id="tab-settings" class="tab-content">
            <div class="settings-grid">
                
                <div class="chart-card">
                    <h3 style="margin-bottom: 1.5rem;">Личные данные</h3>
                    <form onsubmit="event.preventDefault(); alert('Данные успешно сохранены!');">
                        <div class="form-group">
                            <label class="form-label">ФИО</label>
                            <input type="text" class="form-input"
                                value="<?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Асхат Сұлтанов'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input"
                                value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? 'test@example.com'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Телефон</label>
                            <input type="tel" class="form-input" value="+7 (777) 123-45-67">
                        </div>
                        <button class="btn btn-primary" style="width: 100%;">Сохранить изменения</button>
                    </form>
                </div>

                
                <div style="display: flex; flex-direction: column; gap: 2rem;">
                    <div class="chart-card">
                        <h3 style="margin-bottom: 1.5rem;">Уведомления</h3>
                        <div class="toggle-row">
                            <span>Email уведомления</span>
                            <label class="theme-switch" style="scale: 0.8;">
                                <input type="checkbox" checked>
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <div class="toggle-row">
                            <span>SMS оповещения</span>
                            <label class="theme-switch" style="scale: 0.8;">
                                <input type="checkbox" checked>
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <div class="toggle-row" style="border-bottom: none;">
                            <span>Напоминания о приеме</span>
                            <label class="theme-switch" style="scale: 0.8;">
                                <input type="checkbox" checked>
                                <div class="slider round"></div>
                            </label>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3 style="margin-bottom: 1.5rem;">Безопасность</h3>
                        <button class="btn"
                            style="border: 1px solid var(--primary); color: var(--primary); width: 100%; margin-bottom: 1rem;">Сменить
                            пароль</button>
                        <button class="btn" style="border: 1px solid #ef4444; color: #ef4444; width: 100%;">Удалить
                            аккаунт</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <aside class="side-panel">
        <div class="body-scan-card animate-up">
            <div class="scan-overlay-info">
                <div class="scan-status">
                    <i class="fa-solid fa-microchip"></i> Live Body Scan
                </div>
            </div>

            <div id="body-canvas" class="body-canvas-container">
                
            </div>

            <div class="hotspot-info">
                <h4 style="margin-bottom: 0.8rem; font-size: 1rem;">Состояние систем</h4>
                <div class="hotspot-item">
                    <span class="hotspot-label"><i class="fa-solid fa-heart-pulse"
                            style="margin-right: 8px; color: #ef4444;"></i> Сердце</span>
                    <span class="hotspot-value ok">Норма</span>
                </div>
                <div class="hotspot-item">
                    <span class="hotspot-label"><i class="fa-solid fa-lungs"
                            style="margin-right: 8px; color: #3b82f6;"></i> Легкие</span>
                    <span class="hotspot-value ok">98% SpO2</span>
                </div>
                <div class="hotspot-item">
                    <span class="hotspot-label"><i class="fa-solid fa-bone"
                            style="margin-right: 8px; color: #94a3b8;"></i> Позвоночник</span>
                    <span class="hotspot-value check">Проверка</span>
                </div>
                <div class="hotspot-item">
                    <span class="hotspot-label"><i class="fa-solid fa-brain"
                            style="margin-right: 8px; color: #a855f7;"></i> Нервная система</span>
                    <span class="hotspot-value ok">Стабильно</span>
                </div>
            </div>
        </div>

        <div class="chart-card glass-panel" style="padding: 1.5rem; position: relative; overflow: hidden;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                <div class="ai-status-dot"></div>
                <h4 style="margin: 0;">ИИ Доктор</h4>
            </div>
            <p id="ai-insight-text" style="font-size: 0.85rem; line-height: 1.5; color: var(--text-muted);">
                На основе ваших данных за неделю, риск сердечно-сосудистых заболеваний снизился на 5%. Рекомендуется
                увеличить потребление воды.
            </p>
            <div class="ai-wave-container" id="ai-waves">
                <span></span><span></span><span></span><span></span>
            </div>
            <button class="btn" id="askAI"
                style="width: 100%; margin-top: 1rem; border: 1px solid var(--primary); color: var(--primary); font-size: 0.8rem; background: transparent;">
                <i class="fa-solid fa-comment-medical" style="margin-right: 8px;"></i> Задать вопрос ИИ
            </button>
        </div>

        
        <div id="aiChatWidget" class="ai-chat-widget glass-panel">
            <div class="chat-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-robot" style="color: var(--primary);"></i>
                    <span>AI Assistant</span>
                </div>
                <button id="closeChat"
                    style="background:none; border:none; color: var(--text-muted); cursor:pointer;"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div id="chatMessages" class="chat-messages">
                <div class="message ai">Здравствуйте, Асхат! Я проанализировал вашу 3D-модель и последние данные. Чем
                    могу помочь?</div>
            </div>
            <div class="chat-input-area">
                <input type="text" id="aiInput" placeholder="Спросите про пульс или анализы...">
                <button id="sendAiBtn"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>
    </aside>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        const html = document.documentElement;
        const toggleCheckbox = document.getElementById('theme-toggle-check');
        const syncTheme = () => {
            const saved = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            html.setAttribute('data-theme', saved);
            if (toggleCheckbox) toggleCheckbox.checked = (saved === 'dark');
        };
        syncTheme();
        if (toggleCheckbox) {
            toggleCheckbox.addEventListener('change', (e) => {
                const theme = e.target.checked ? 'dark' : 'light';
                html.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                
                location.reload();
            });
        }

        
        const tabs = document.querySelectorAll('#dashboardTabs a');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                if (tab.classList.contains('logout')) return;
                e.preventDefault();

                const targetTab = tab.getAttribute('data-tab');

                
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                
                tabContents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === `tab-${targetTab}`) {
                        content.classList.add('active');
                    }
                });
            });
        });

        
        document.querySelectorAll('.download-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const progress = btn.querySelector('.download-progress');
                const icon = btn.querySelector('i');

                if (btn.classList.contains('loading')) return;

                btn.classList.add('loading');
                icon.className = 'fa-solid fa-spinner fa-spin';

                let width = 0;
                const interval = setInterval(() => {
                    width += 10;
                    progress.style.width = width + '%';
                    if (width >= 100) {
                        clearInterval(interval);
                        icon.className = 'fa-solid fa-check';
                        icon.style.color = '#10b981';
                        setTimeout(() => {
                            icon.className = 'fa-solid fa-download';
                            icon.style.color = '';
                            progress.style.width = '0%';
                            btn.classList.remove('loading');
                        }, 2000);
                    }
                }, 200);
            });
        });

        
        const exportBtn = document.getElementById('exportBtn');
        const exportOverlay = document.getElementById('exportOverlay');
        const exportSpinner = document.getElementById('exportSpinner');
        const exportSuccess = document.getElementById('exportSuccess');
        const exportText = document.getElementById('exportText');
        const exportSub = document.getElementById('exportSub');
        const closeExport = document.getElementById('closeExport');

        if (exportBtn && exportOverlay) {
            exportBtn.addEventListener('click', (e) => {
                e.preventDefault();
                exportOverlay.style.display = 'flex';
                
                exportSpinner.style.display = 'block';
                exportSuccess.style.display = 'none';
                closeExport.style.display = 'none';
                exportText.innerText = 'Генерация PDF отчета...';
                exportSub.innerText = 'Пожалуйста, подождите, собираем вашу историю болезней и анализы.';

                
                setTimeout(() => {
                    exportText.innerText = 'Формирование файла...';
                }, 1500);

                setTimeout(() => {
                    exportSpinner.style.display = 'none';
                    exportSuccess.style.display = 'block';
                    exportSuccess.classList.add('animate-up');
                    exportText.innerText = 'Отчет готов!';
                    exportSub.innerText = 'Ваш полный отчет о здоровье успешно сгенерирован.';
                    closeExport.style.display = 'block';
                }, 3000);
            });

            closeExport.addEventListener('click', () => {
                exportOverlay.style.display = 'none';
                
                const link = document.createElement('a');
                link.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent('MEDICAL REPORT FILE CONTENT');
                link.download = 'Medical_Report_Full.txt';
                link.click();
            });

            
            exportOverlay.addEventListener('click', (e) => {
                if (e.target === exportOverlay) {
                    exportOverlay.style.display = 'none';
                }
            });
        }

        
        setTimeout(() => {
            const toast = document.getElementById('welcomeToast');
            if (toast) toast.classList.add('show');
            setTimeout(() => {
                if (toast) toast.classList.remove('show');
            }, 5000);
        }, 1500);

        
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';
        const textColor = isDark ? '#94a3b8' : '#64748b';

        Chart.defaults.color = textColor;
        Chart.defaults.font.family = "'Outfit', sans-serif";

        
        const pulseCtx = document.getElementById('pulseChart').getContext('2d');
        new Chart(pulseCtx, {
            type: 'line',
            data: {
                labels: ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00'],
                datasets: [{
                    label: 'ЧСС (уд/мин)',
                    data: [68, 72, 85, 78, 74, 82, 70],
                    borderColor: '#00b4d8',
                    backgroundColor: 'rgba(0, 180, 216, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#00b4d8',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { min: 60, max: 100, grid: { color: gridColor } },
                    x: { grid: { display: false } }
                }
            }
        });

        
        const weightCtx = document.getElementById('weightChart').getContext('2d');
        new Chart(weightCtx, {
            type: 'line',
            data: {
                labels: ['Ср', 'Чт', 'Пт', 'Сб', 'Вс', 'Пн', 'Вт'],
                datasets: [{
                    label: 'Вес (кг)',
                    data: [77.2, 77.0, 76.8, 76.5, 76.8, 76.2, 76.0],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { min: 74, max: 80, grid: { color: gridColor } },
                    x: { grid: { display: false } }
                }
            }
        });        
        const askAI = document.getElementById('askAI');
        const aiChatWidget = document.getElementById('aiChatWidget');
        const closeChat = document.getElementById('closeChat');
        const sendAiBtn = document.getElementById('sendAiBtn');
        const aiInput = document.getElementById('aiInput');
        const chatMessages = document.getElementById('chatMessages');
        const aiWaves = document.getElementById('ai_waves');

        const toggleChat = (show) => {
            if (show) {
                aiChatWidget.style.display = 'flex';
                setTimeout(() => aiChatWidget.classList.add('active'), 10);
            } else {
                aiChatWidget.classList.remove('active');
                setTimeout(() => aiChatWidget.style.display = 'none', 400);
            }
        };

        if (askAI) askAI.addEventListener('click', () => toggleChat(true));
        if (closeChat) closeChat.addEventListener('click', () => toggleChat(false));

        const addMessage = (text, sender) => {
            const msg = document.createElement('div');
            msg.className = `message ${sender} page-fade-in`;
            msg.innerText = text;
            chatMessages.appendChild(msg);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        const handleAISend = async () => {
            const query = aiInput.value.trim();
            if (!query) return;

            addMessage(query, 'user');
            aiInput.value = '';

            const waves = document.getElementById('ai-waves');
            if (waves) waves.classList.add('active');

            try {
                const response = await fetch('<?php echo BASE_URL; ?>/api/ai-chat', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: query })
                });
                const data = await response.json();

                if (waves) waves.classList.remove('active');
                addMessage(data.response || data.error, 'ai');
            } catch (error) {
                if (waves) waves.classList.remove('active');
                addMessage("Ошибка связи с ИИ. Попробуйте позже.", "ai");
            }
        };

        if (sendAiBtn) sendAiBtn.addEventListener('click', handleAISend);
        if (aiInput) aiInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') handleAISend(); });
        (function initBodyScan() {
            const container = document.getElementById('body-canvas');
            if (!container) return;

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(40, container.clientWidth / container.clientHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });

            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            const bodyGroup = new THREE.Group();
            scene.add(bodyGroup);

            
            const skinMaterial = new THREE.MeshStandardMaterial({
                color: 0x00b4d8,
                transparent: true,
                opacity: 0.25,
                metalness: 0.1,
                roughness: 0.2,
                emissive: 0x00b4d8,
                emissiveIntensity: 0.2,
                side: THREE.DoubleSide
            });

            
            const createOrganicShape = (pointsCoords, scale = [1, 1, 1], pos = [0, 0, 0], rot = [0, 0, 0]) => {
                const points = pointsCoords.map(p => new THREE.Vector2(p[0], p[1]));
                const geom = new THREE.LatheGeometry(points, 32);
                const mesh = new THREE.Mesh(geom, skinMaterial);
                mesh.scale.set(...scale);
                mesh.position.set(...pos);
                mesh.rotation.set(...rot);
                bodyGroup.add(mesh);
                return mesh;
            };

            
            const torsoPoints = [[0.1, 0], [0.5, 0.2], [0.6, 0.8], [0.4, 1.5], [0.75, 2.2], [0.1, 2.5]];
            createOrganicShape(torsoPoints, [1.4, 1.3, 0.9], [0, 0.8, 0]);

            
            const headPoints = [[0.12, 0], [0.15, 0.3], [0.3, 0.4], [0.45, 0.7], [0.4, 1.1], [0.15, 1.3]];
            createOrganicShape(headPoints, [1, 1, 1], [0, 3.4, 0]);

            
            const createLimb = (start, mid, end, thickness) => {
                const curve = new THREE.QuadraticBezierCurve3(
                    new THREE.Vector3(...start),
                    new THREE.Vector3(...mid),
                    new THREE.Vector3(...end)
                );
                const geom = new THREE.TubeGeometry(curve, 20, thickness, 12, false);
                const mesh = new THREE.Mesh(geom, skinMaterial);
                bodyGroup.add(mesh);
            };

            
            createLimb([-0.7, 3.2, 0], [-1.2, 2.3, 0.1], [-1.1, 1.2, 0.2], 0.14); 
            createLimb([0.7, 3.2, 0], [1.2, 2.3, 0.1], [1.1, 1.2, 0.2], 0.14);  

            
            createLimb([-0.4, 1.0, 0], [-0.5, -0.4, 0.1], [-0.45, -1.8, 0.05], 0.22); 
            createLimb([0.4, 1.0, 0], [0.5, -0.4, 0.1], [0.45, -1.8, 0.05], 0.22);  

            
            const heart = new THREE.Mesh(
                new THREE.SphereGeometry(0.18, 20, 20),
                new THREE.MeshStandardMaterial({ color: 0xff3366, emissive: 0xff3366, emissiveIntensity: 1 })
            );
            heart.position.set(0.15, 2.8, 0.4);
            bodyGroup.add(heart);

            
            const scanLight = new THREE.RectAreaLight(0x00b4d8, 5, 4, 0.1);
            scanLight.position.set(0, 4, 2);
            scene.add(scanLight);

            scene.add(new THREE.AmbientLight(0xffffff, 0.5));
            const pLight = new THREE.PointLight(0x00b4d8, 2);
            pLight.position.set(2, 5, 5);
            scene.add(pLight);

            camera.position.z = 11;
            camera.position.y = 1.2;

            function animate() {
                requestAnimationFrame(animate);
                const t = Date.now() * 0.001;

                bodyGroup.rotation.y += 0.005;

                
                const pulse = Math.sin(t * 6) * 0.15 + 1;
                heart.scale.set(pulse, pulse, pulse);
                heart.material.emissiveIntensity = 0.5 + Math.sin(t * 6) * 0.5;

                
                scanLight.position.y = Math.sin(t * 0.5) * 3 + 1;

                renderer.render(scene, camera);
            }
            animate();

            window.addEventListener('resize', () => {
                const w = container.clientWidth;
                const h = container.clientHeight;
                if (!w) return;
                camera.aspect = w / h;
                camera.updateProjectionMatrix();
                renderer.setSize(w, h);
            });
        })();
    });
</script>


});
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>