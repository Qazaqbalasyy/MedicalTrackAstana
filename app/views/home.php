<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astana Medical | Профессиональная забота</title>
    <meta name="description"
        content="Astana Medical - современная цифровая клиника в Астане. Запись к врачу онлайн, электронная карта и мониторинг здоровья.">
    <meta name="keywords" content="клиника астана, запись к врачу, медицинский центр, Astana Medical, медицина онлайн">

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="Astana Medical | Профессиональная забота">
    <meta property="og:description" content="Цифровая клиника в сердце столицы. Забота о каждом пациенте.">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/public/img/og-image.jpg">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    
    <style>
        
        [data-theme="dark"] {
            --primary: #00b4d8;
            --primary-dark: #0096c7;
            --surface: rgba(16, 23, 42, 0.85) !important;
            
            --surface-glass: rgba(13, 18, 30, 0.6) !important;
            --text-main: #ffffff !important;
            --text-muted: #94a3b8 !important;

            
            --bg-gradient: radial-gradient(circle at top right, #1e293b 0%, #020617 100%) !important;

            --card-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.7) !important;
            --glass-border: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        
        [data-theme="dark"] body {
            background: var(--bg-gradient) !important;
            color: var(--text-main) !important;
        }

        
        [data-theme="dark"] .glass-panel,
        [data-theme="dark"] .doctor-card,
        [data-theme="dark"] .review-card {
            background: var(--surface) !important;
            border: var(--glass-border) !important;
            backdrop-filter: blur(12px) !important;
            box-shadow: var(--card-shadow) !important;
        }

        
        [data-theme="dark"] .stats-card,
        [data-theme="dark"] .doctor-appointment {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.6) 0%, rgba(15, 23, 42, 0.8) 100%) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            color: white !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        [data-theme="dark"] .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 180, 216, 0.15) !important;
            border-color: rgba(0, 180, 216, 0.3) !important;
        }

        [data-theme="dark"] .stats-card h3 {
            color: #f8fafc !important;
            
            font-weight: 700 !important;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        [data-theme="dark"] .stats-card p {
            color: #94a3b8 !important;
            
            font-size: 0.85rem !important;
        }

        
        [data-theme="dark"] .doctor-appointment {
            background: rgba(30, 41, 59, 0.4) !important;
            margin-top: 1rem;
        }

        
        [data-theme="dark"] .stat-item {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding-left: 0 !important;
            
        }

        
        [data-theme="dark"] h1,
        [data-theme="dark"] h2,
        [data-theme="dark"] h3,
        [data-theme="dark"] h4 {
            color: #ffffff !important;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        [data-theme="dark"] p,
        [data-theme="dark"] span,
        [data-theme="dark"] li {
            color: #cbd5e1 !important;
        }

        


        
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(240, 249, 255, 0.85);
            backdrop-filter: blur(8px);
            z-index: 0;
            transition: background 0.3s ease;
        }

        [data-theme="dark"] .hero-overlay {
            background: rgba(2, 6, 23, 0.85) !important;
        }

        
        [data-theme="dark"] footer {
            background: rgba(2, 6, 23, 0.95) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
            position: relative;
            z-index: 10;
        }

        [data-theme="dark"] footer a {
            color: #cbd5e1 !important;
        }

        [data-theme="dark"] footer a:hover {
            color: var(--primary) !important;
        }

        
        .lang-switcher {
            display: flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.05);
            padding: 4px;
            border-radius: 20px;
            margin: 0 1rem;
        }

        .lang-btn {
            text-decoration: none;
            color: var(--text-muted);
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .lang-btn:hover {
            color: var(--primary);
        }

        .lang-btn.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        
        [data-theme="dark"] .lang-switcher {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        [data-theme="dark"] .lang-btn {
            color: #94a3b8;
        }

        [data-theme="dark"] .lang-btn:hover {
            color: white;
        }

        [data-theme="dark"] .lang-btn.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 180, 216, 0.3);
        }

        
        .chat-widget {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 2000;
            font-family: 'Outfit', sans-serif;
        }

        
        .chat-trigger {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(0, 180, 216, 0.4);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
        }

        .chat-trigger:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .chat-trigger i {
            transition: transform 0.4s;
        }

        .chat-widget.active .chat-trigger i {
            transform: rotate(180deg);
        }

        
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(8px);
            z-index: 3000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .booking-modal {
            width: 90%;
            max-width: 600px;
            background: var(--surface);
            border: var(--glass-border);
            border-radius: 28px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transform: scale(0.9) translateY(20px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .modal-overlay.active .booking-modal {
            transform: scale(1) translateY(0);
        }

        
        .wizard-header {
            padding: 2rem;
            text-align: center;
            border-bottom: var(--glass-border);
        }

        .steps-indicator {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .step-pill {
            padding: 0.5rem 1rem;
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.05);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            transition: all 0.3s;
        }

        [data-theme="dark"] .step-pill {
            background: rgba(255, 255, 255, 0.05);
        }

        .step-pill.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
        }

        
        .wizard-body {
            padding: 2rem;
            min-height: 350px;
        }

        .wizard-step {
            display: none;
            animation: fadeInUp 0.5s ease-out;
        }

        .wizard-step.active {
            display: block;
        }

        
        .doctor-select-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .doctor-opt {
            padding: 1rem;
            border-radius: 16px;
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
        }

        [data-theme="dark"] .doctor-opt {
            background: rgba(255, 255, 255, 0.05);
        }

        .doctor-opt:hover {
            border-color: var(--primary);
        }

        .doctor-opt.selected {
            background: rgba(0, 180, 216, 0.1);
            border-color: var(--primary);
        }

        .doctor-opt img {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            object-fit: cover;
        }

        
        .date-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.8rem;
        }

        .date-opt {
            padding: 0.8rem;
            text-align: center;
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.03);
            cursor: pointer;
            transition: all 0.3s;
        }

        [data-theme="dark"] .date-opt {
            background: rgba(255, 255, 255, 0.05);
        }

        .date-opt:hover {
            background: var(--primary);
            color: white;
        }

        .date-opt.selected {
            background: var(--primary);
            color: white;
        }

        
        .wizard-footer {
            padding: 1.5rem 2rem;
            border-top: var(--glass-border);
            display: flex;
            justify-content: space-between;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: color 0.3s;
        }

        .close-modal:hover {
            color: var(--primary);
        }

        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 100px;
            
            width: 50px;
            height: 50px;
            background: var(--surface);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary);
            cursor: pointer;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 180, 216, 0.2);
        }

        
        .chat-window {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 350px;
            height: 500px;
            background: var(--surface);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) scale(0.9);
            transform-origin: bottom right;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .chat-widget.active .chat-window {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        
        .chat-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-header .ai-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .chat-header h4 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .chat-header p {
            margin: 0;
            font-size: 0.8rem;
            opacity: 0.8;
            color: white !important;
        }

        
        .chat-body {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .chat-msg {
            max-width: 80%;
            padding: 0.8rem 1rem;
            border-radius: 16px;
            font-size: 0.9rem;
            line-height: 1.4;
            animation: msgPop 0.3s ease-out forwards;
        }

        .msg-ai {
            align-self: flex-start;
            background: rgba(0, 180, 216, 0.1);
            color: var(--text-main);
            border-bottom-left-radius: 4px;
        }

        [data-theme="dark"] .msg-ai {
            background: rgba(255, 255, 255, 0.05);
        }

        .msg-user {
            align-self: flex-end;
            background: var(--primary);
            color: white;
            border-bottom-right-radius: 4px;
        }

        
        .chat-footer {
            padding: 1rem 1.5rem;
            border-top: var(--glass-border);
            display: flex;
            gap: 10px;
        }

        .chat-input {
            flex: 1;
            background: rgba(0, 0, 0, 0.05);
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 12px;
            color: var(--text-main);
            font-size: 0.9rem;
            outline: none;
        }

        [data-theme="dark"] .chat-input {
            background: rgba(255, 255, 255, 0.05);
        }

        @keyframes msgPop {
            from {
                opacity: 0;
                transform: translateY(10px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        
        #preloader {
            position: fixed;
            inset: 0;
            background: #f8fcff;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
        }

        [data-theme="dark"] #preloader {
            background: #020617;
        }

        .preloader-content {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        
        .heart-wrapper {
            position: relative;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .heartbeat-icon {
            font-size: 3.5rem;
            color: var(--primary);
            z-index: 2;
            animation: lubdub 1.2s infinite ease-in-out;
            filter: drop-shadow(0 0 10px rgba(0, 180, 216, 0.5));
        }

        
        .heart-ripple {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 180, 216, 0.6);
            border-radius: 50%;
            opacity: 0;
            z-index: 1;
            animation: ripple 1.2s infinite ease-out;
        }

        .preloader-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            animation: fadeInUp 0.8s 0.3s forwards;
            letter-spacing: -1px;
        }

        [data-theme="dark"] .preloader-title {
            background: linear-gradient(135deg, #fff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        
        @keyframes lubdub {
            0% {
                transform: scale(1);
                filter: brightness(100%);
            }

            15% {
                transform: scale(1.15);
                filter: brightness(110%);
            }

            
            30% {
                transform: scale(1);
                filter: brightness(100%);
            }

            45% {
                transform: scale(1.1);
                filter: brightness(105%);
            }

            
            60% {
                transform: scale(1);
                filter: brightness(100%);
            }

            100% {
                transform: scale(1);
                filter: brightness(100%);
            }
        }

        
        .brand i {}

        @keyframes ripple {
            0% {
                transform: scale(0.8);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.8);
                opacity: 0;
            }

            100% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        #preloader.loaded {
            opacity: 0;
            visibility: hidden;
        }

        
        .blob-cont {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            
            transform: translateZ(0);
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            
            opacity: 0.5;
            animation: float 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
            
        }

        
        .blob-1 {
            top: -10%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: #e0f2fe;
            animation-delay: 0s;
        }

        .blob-2 {
            bottom: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: #dbeafe;
            animation-delay: -5s;
        }

        .blob-3 {
            bottom: 20%;
            left: 20%;
            width: 400px;
            height: 400px;
            background: #f0f9ff;
            opacity: 0.4;
            animation-delay: -10s;
        }

        
        [data-theme="dark"] .blob-1 {
            background: rgba(0, 180, 216, 0.15);
        }

        [data-theme="dark"] .blob-2 {
            background: rgba(56, 189, 248, 0.12);
        }

        [data-theme="dark"] .blob-3 {
            background: rgba(3, 105, 161, 0.15);
        }

        
        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            perspective: 2000px;
        }

        .doctor-card {
            background: var(--surface);
            border: var(--glass-border);
            border-radius: 32px;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            transform-style: preserve-3d;
            box-shadow: var(--card-shadow);
            position: relative;
        }

        .doctor-card:hover {
            box-shadow: 0 25px 50px rgba(0, 180, 216, 0.2);
        }

        .doctor-img {
            height: 380px;
            overflow: hidden;
            position: relative;
        }

        .doctor-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .doctor-card:hover .doctor-img img {
            transform: scale(1.05);
        }

        .doctor-img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 60%, var(--surface) 100%);
        }

        .doctor-info {
            padding: 2.5rem;
            text-align: center;
            transform: translateZ(30px);
        }

        .doctor-info h3 {
            margin-bottom: 0.5rem;
            font-size: 1.4rem;
        }

        .doctor-specialty {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            background: rgba(0, 180, 216, 0.1);
            color: var(--primary);
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }

        .btn-more {
            margin-top: 1.5rem;
            width: 100%;
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            padding: 0.9rem;
            border-radius: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-more:hover {
            background: var(--primary);
            color: white;
            box-shadow: 0 8px 20px rgba(0, 180, 216, 0.3);
        }

        
        [data-theme="dark"] #doctors {
            background: transparent !important;
        }

        #doctors {
            transition: background 0.3s ease;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg) scale(1);
            }

            50% {
                transform: translate(30px, 50px) rotate(10deg) scale(1.1);
            }

            100% {
                transform: translate(-20px, 80px) rotate(-10deg) scale(0.95);
            }
        }

        
        .progress-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            z-index: 2100;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            width: 0%;
            transition: width 0.1s;
        }

        
        .checkups-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .checkup-card {
            background: var(--surface);
            border: var(--glass-border);
            border-radius: 32px;
            padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 180, 216, 0.1);
        }

        .checkup-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(0, 180, 216, 0.15);
        }

        .checkup-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .checkup-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            margin: 1.5rem 0;
            display: block;
        }

        .checkup-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .checkup-features li {
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkup-features i {
            color: #10b981;
            font-size: 0.8rem;
        }

        
        #newsletter {
            margin-top: 4rem;
            padding: 6rem 0;
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1) 0%, rgba(72, 202, 228, 0.05) 100%);
            border-radius: 60px;
            text-align: center;
        }

        .news-box {
            max-width: 600px;
            margin: 0 auto;
        }

        .news-form {
            display: flex;
            gap: 10px;
            margin-top: 2rem;
            background: var(--surface);
            padding: 8px;
            border-radius: 20px;
            border: var(--glass-border);
        }

        .news-form input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 0 1.5rem;
            color: var(--text-main);
            outline: none;
        }

        .news-form .btn {
            border-radius: 12px;
        }

        @media (max-width: 600px) {
            .news-form {
                flex-direction: column;
                background: transparent;
                border: none;
                padding: 0;
            }

            .news-form input {
                background: var(--surface);
                padding: 1.2rem;
                border-radius: 16px;
                border: var(--glass-border);
                margin-bottom: 10px;
            }
        }

        
        #map-container {
            margin-top: 4rem;
            position: relative;
            height: 500px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 10;
        }

        #map {
            height: 100%;
            width: 100%;
            z-index: 1;
        }

        .map-overlay-card {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 1000;
            background: var(--surface);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 2rem;
            border-radius: 24px;
            border: var(--glass-border);
            max-width: 320px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .map-overlay-card:hover {
            transform: translateY(-5px);
        }

        .map-overlay-card h3 {
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .map-btn-route {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.6rem 1.2rem;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .map-btn-route:hover {
            background: var(--primary-dark);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
        }

        
        #map {
            background-color: #f0f0f0;
            
        }

        [data-theme="dark"] .leaflet-tile-pane {
            opacity: 1 !important;
            filter: none !important;
        }

        
        #symptom-checker {
            padding: 6rem 0;
            background: var(--surface);
            border-radius: 60px;
            margin: 4rem 0;
            border: var(--glass-border);
        }

        .symptom-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .symptom-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1.2rem;
            background: rgba(0, 0, 0, 0.03);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            position: relative;
        }

        [data-theme="dark"] .symptom-item {
            background: rgba(255, 255, 255, 0.03);
        }

        .symptom-item:hover {
            border-color: var(--primary);
        }

        .symptom-item input {
            position: absolute;
            opacity: 0;
        }

        .symptom-item.active {
            background: rgba(0, 180, 216, 0.1);
            border-color: var(--primary);
        }

        
        #symptom-checker {
            position: relative;
            padding: 6rem 0;
            overflow: hidden;
        }

        
        #symptom-checker::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(0, 180, 216, 0.05) 0%, transparent 70%);
            z-index: -1;
            animation: rotateBg 60s linear infinite;
        }

        @keyframes rotateBg {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        
        .symptom-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
            perspective: 1000px;
        }

        .symptom-item {
            position: relative;
            background: var(--surface);
            border: var(--glass-border);
            border-radius: 20px;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 1rem;
            box-shadow: var(--card-shadow);
        }

        .symptom-item i {
            font-size: 2rem;
            background: linear-gradient(135deg, var(--text-muted) 0%, var(--text-main) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: transform 0.4s;
        }

        .symptom-item span {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        
        .symptom-item input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        
        .symptom-item.active {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1) 0%, rgba(0, 150, 199, 0.05) 100%);
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.2);
            transform: translateY(-5px);
        }

        .symptom-item.active i {
            transform: scale(1.2);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .symptom-item.active span {
            color: var(--primary);
        }

        
        .symptom-item:hover:not(.active) {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border-color: rgba(0, 180, 216, 0.3);
        }

        
        .scanner-overlay {
            position: fixed;
            
            inset: 0;
            background: rgba(2, 6, 23, 0.85);
            
            backdrop-filter: blur(10px);
            z-index: 5000;
            display: none;
            
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .scanner-overlay.active {
            display: flex;
            opacity: 1;
        }

        .scanner-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid rgba(0, 180, 216, 0.2);
            border-top-color: var(--primary);
            animation: spin 1s infinite linear;
            margin-bottom: 2rem;
            position: relative;
            box-shadow: 0 0 50px rgba(0, 180, 216, 0.3);
        }

        .scanner-circle::before {
            content: '';
            position: absolute;
            inset: 10px;
            border-radius: 50%;
            border: 3px solid rgba(0, 180, 216, 0.1);
            border-bottom-color: var(--secondary);
            animation: spin 2s infinite reverse linear;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .scanning-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 0 20px rgba(0, 180, 216, 0.5);
            margin-bottom: 0.5rem;
            font-family: 'Outfit', sans-serif;
        }

        .scanning-subtext {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        
        .checker-results {
            margin-top: 3rem;
            background: var(--surface);
            border: var(--glass-border);
            
            border-radius: 30px;
            padding: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            display: none;
            
        }

        
        .result-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
        }

        .result-score {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: conic-gradient(var(--primary) 0%, var(--primary) 0%, rgba(0, 0, 0, 0.05) 0%);
            
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            position: relative;
        }

        .result-score::after {
            content: '';
            position: absolute;
            inset: 8px;
            
            background: var(--surface);
            border-radius: 50%;
            z-index: 0;
        }

        .result-score span {
            position: relative;
            z-index: 1;
        }

        .result-doctor-card {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.05) 0%, rgba(72, 202, 228, 0.05) 100%);
            border-radius: 20px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .result-doctor-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>

<body>
    
    <div class="progress-wrap">
        <div class="progress-bar" id="readingProgress"></div>
    </div>

    
    <div id="preloader">
        <div class="preloader-content">
            <div class="heart-wrapper">
                <div class="heart-ripple"></div>
                <i class="fa-solid fa-heart-pulse heartbeat-icon"></i>
            </div>
            <div class="preloader-title">Astana Medical</div>
        </div>
    </div>

    
    <div class="blob-cont">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    
    <nav class="navbar">
        <div class="container nav-content">
            <a href="./" class="brand">
                <i class="fa-solid fa-heart-pulse"></i> Astana Medical
            </a>
            <button class="nav-toggle" id="navToggle">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#features" class="nav-link"><?= App\Core\Lang::get('nav_functions') ?></a></li>
                <li><a href="#doctors" class="nav-link"><?= App\Core\Lang::get('nav_doctors') ?></a></li>
                <li><a href="#about" class="nav-link"><?= App\Core\Lang::get('nav_about') ?></a></li>
                <li class="mobile-only"><a href="./dashboard" class="btn btn-primary"
                        style="width: 100%;"><?= App\Core\Lang::get('nav_cabinet') ?></a>
                </li>
            </ul>
            
            <div class="lang-select-wrapper">
                <div class="lang-select-btn">
                    <?php
                    $cur = App\Core\Lang::current();
                    $flag = 'https://flagcdn.com/w40/ru.png';
                    if ($cur == 'kk')
                        $flag = 'https://flagcdn.com/w40/kz.png';
                    if ($cur == 'en')
                        $flag = 'https://flagcdn.com/w40/gb.png';
                    ?>
                    <img src="<?= $flag ?>" alt="<?= $cur ?>" class="lang-flag">
                    <span style="text-transform: uppercase;"><?= $cur ?></span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem; opacity: 0.6;"></i>
                </div>
                <div class="lang-dropdown">
                    <a href="<?= BASE_URL ?>/lang/ru" class="lang-option <?= $cur == 'ru' ? 'active' : '' ?>">
                        <img src="https://flagcdn.com/w40/ru.png" class="lang-flag"> Русский
                    </a>
                    <a href="<?= BASE_URL ?>/lang/kk" class="lang-option <?= $cur == 'kk' ? 'active' : '' ?>">
                        <img src="https://flagcdn.com/w40/kz.png" class="lang-flag"> Қазақша
                    </a>
                    <a href="<?= BASE_URL ?>/lang/en" class="lang-option <?= $cur == 'en' ? 'active' : '' ?>">
                        <img src="https://flagcdn.com/w40/gb.png" class="lang-flag"> English
                    </a>
                </div>
            </div>
            <div style="display: flex; align-items: center;">
                <a href="./dashboard" class="btn btn-primary desktop-only"><?= App\Core\Lang::get('nav_cabinet') ?></a>
                
                
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="theme-toggle-check">
                        <input type="checkbox" id="theme-toggle-check" />
                        <div class="slider round">
                            <i class="fa-solid fa-sun"></i>
                            <i class="fa-solid fa-moon"></i>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </nav>

    
    

    
    <section class="hero"
        style="background: url('<?php echo BASE_URL; ?>/public/img/astana-bg.png') no-repeat center center/cover;">
        <div class="hero-overlay"></div>
        <div class="container hero-content" style="position: relative; z-index: 1;">
            <div class="hero-text">
                <h1 class="animate-up"><?= App\Core\Lang::get('hero_title') ?><br><span
                        class="text-gradient"><?= App\Core\Lang::get('hero_subtitle') ?></span></h1>
                <p class="animate-up delay-1">
                    <?= App\Core\Lang::get('hero_desc') ?>
                </p>
                <div class="hero-buttons animate-up delay-2">
                    <a href="./register" class="btn btn-primary" style="text-decoration: none;">
                        <?= App\Core\Lang::get('hero_btn_start') ?> <i class="fa-solid fa-arrow-right"
                            style="margin-left: 8px;"></i>
                    </a>
                </div>

                <div class="hero-stats animate-up delay-3">
                    <div class="stat-item">
                        <h3 class="text-gradient counter" data-target="10" data-suffix="x">0x</h3>
                        <p><?= App\Core\Lang::get('stat_diag') ?></p>
                    </div>
                    <div class="stat-item">
                        <h3 class="text-gradient counter" data-target="24" data-suffix="/7">0/7</h3>
                        <p><?= App\Core\Lang::get('stat_ai') ?></p>
                    </div>
                    <div class="stat-item">
                        <h3 class="text-gradient counter" data-target="1000000" data-suffix="+" data-format="short">0
                        </h3>
                        <p><?= App\Core\Lang::get('stat_records') ?></p>
                    </div>
                </div>
            </div>

            <div class="hero-visual animate-up delay-2">
                <div class="glass-panel dashboard-preview">
                    <div class="card-header">
                        <div>
                            <h4><?= App\Core\Lang::get('dash_title') ?></h4>
                            <p style="font-size: 0.8rem; color: var(--text-muted);">
                                <?= App\Core\Lang::get('dash_today') ?>
                            </p>
                        </div>
                        <i class="fa-solid fa-bell" style="color: var(--primary);"></i>
                    </div>

                    <div class="health-grid">
                        <div class="health-card">
                            <div class="health-icon">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <h3 id="preview-pulse">72 <span
                                    style="font-size: 0.8rem; color: var(--text-muted);">уд/мин</span></h3>
                            <p style="font-size: 0.8rem;"><?= App\Core\Lang::get('dash_pulse') ?></p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: var(--secondary);">
                                <i class="fa-solid fa-droplet"></i>
                            </div>
                            <h3 id="preview-oxygen">98 <span
                                    style="font-size: 0.8rem; color: var(--text-muted);">%</span></h3>
                            <p style="font-size: 0.8rem;"><?= App\Core\Lang::get('dash_oxygen') ?></p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: var(--accent);">
                                <i class="fa-solid fa-fire"></i>
                            </div>
                            <h3 id="preview-calories">1,204</h3>
                            <p style="font-size: 0.8rem;"><?= App\Core\Lang::get('dash_calories') ?></p>
                        </div>
                        <div class="health-card">
                            <div class="health-icon" style="color: #10b981;">
                                <i class="fa-solid fa-moon"></i>
                            </div>
                            <h3 id="preview-sleep">7ч 20м</h3>
                            <p style="font-size: 0.8rem;"><?= App\Core\Lang::get('dash_sleep') ?></p>
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
                            <p style="margin:0; font-size: 0.8rem; color: var(--text-muted);">
                                <?= App\Core\Lang::get('dash_doctor_visit') ?>: 14:00
                            </p>
                        </div>
                        <button
                            style="margin-left: auto; padding: 0.5rem; border-radius: 8px; border: none; background: white; cursor: pointer; color: var(--primary);"><?= App\Core\Lang::get('dash_enter') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="features">
        <div class="container">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('feat_title') ?></h2>
                <p><?= App\Core\Lang::get('feat_desc') ?></p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-notes-medical"></i>
                    </div>
                    <h3><?= App\Core\Lang::get('feat_card1_title') ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;"><?= App\Core\Lang::get('feat_card1_desc') ?>
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3><?= App\Core\Lang::get('feat_card2_title') ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;"><?= App\Core\Lang::get('feat_card2_desc') ?>
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <h3><?= App\Core\Lang::get('feat_card3_title') ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;"><?= App\Core\Lang::get('feat_card3_desc') ?>
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h3><?= App\Core\Lang::get('feat_card4_title') ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;"><?= App\Core\Lang::get('feat_card4_desc') ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="doctors" style="background: white;">
        <div class="container">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('doc_title') ?></h2>
                <p><?= App\Core\Lang::get('doc_desc') ?></p>
            </div>

            <div class="doctors-grid">
                <div class="doctor-card animate-up">
                    <div class="doctor-img">
                        <img src="<?php echo BASE_URL; ?>/public/img/doc_kazakh_1.png" alt="Dr. Arman Nurlanov"
                            style="object-position: top;">
                    </div>
                    <div class="doctor-info">
                        <span class="doctor-specialty"><?= App\Core\Lang::get('doc_card1_spec') ?></span>
                        <h3>Д-р Арман Нурланов</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); min-height: 3rem;">
                            <?= App\Core\Lang::get('doc_card1_text') ?>
                        </p>
                        <button class="btn-more"><?= App\Core\Lang::get('doc_card_more') ?></button>
                    </div>
                </div>

                <div class="doctor-card animate-up delay-1">
                    <div class="doctor-img">
                        <img src="<?php echo BASE_URL; ?>/public/img/doc_kazakh_2.png" alt="Dr. Aigul Serikova"
                            style="object-position: top;">
                    </div>
                    <div class="doctor-info">
                        <span class="doctor-specialty"><?= App\Core\Lang::get('doc_card2_spec') ?></span>
                        <h3>Д-р Айгуль Серикова</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); min-height: 3rem;">
                            <?= App\Core\Lang::get('doc_card2_text') ?>
                        </p>
                        <button class="btn-more"><?= App\Core\Lang::get('doc_card_more') ?></button>
                    </div>
                </div>

                <div class="doctor-card animate-up delay-2">
                    <div class="doctor-img">
                        <img src="<?php echo BASE_URL; ?>/public/img/doc_kazakh_3.png" alt="Dr. Gulnara Alimova"
                            style="object-position: top;">
                    </div>
                    <div class="doctor-info">
                        <span class="doctor-specialty"><?= App\Core\Lang::get('doc_card3_spec') ?></span>
                        <h3>Д-р Гульнара Алимова</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); min-height: 3rem;">
                            <?= App\Core\Lang::get('doc_card3_text') ?>
                        </p>
                        <button class="btn-more"><?= App\Core\Lang::get('doc_card_more') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="checkups">
        <div class="container">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('checkup_title') ?></h2>
                <p><?= App\Core\Lang::get('checkup_desc') ?></p>
            </div>

            <div class="checkups-grid">
                <div class="checkup-card animate-up">
                    <div class="checkup-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                    <h3><?= App\Core\Lang::get('checkup_card1_title') ?></h3>
                    <p><?= App\Core\Lang::get('checkup_card1_desc') ?></p>
                    <span class="checkup-price"><?= App\Core\Lang::get('checkup_card1_price') ?></span>
                    <ul class="checkup-features">
                        <li><i class="fa-solid fa-check"></i> ЭКГ с расшифровкой</li>
                        <li><i class="fa-solid fa-check"></i> УЗИ сердца (ЭхоКГ)</li>
                        <li><i class="fa-solid fa-check"></i> Липидный профиль</li>
                        <li><i class="fa-solid fa-check"></i> Прием кардиолога</li>
                    </ul>
                    <a href="#bookingModal" class="btn btn-primary"
                        style="width: 100%;"><?= App\Core\Lang::get('hero_btn_start') ?></a>
                </div>

                <div class="checkup-card animate-up delay-1">
                    <div class="checkup-icon" style="color: #ec4899;"><i class="fa-solid fa-venus"></i></div>
                    <h3><?= App\Core\Lang::get('checkup_card2_title') ?></h3>
                    <p><?= App\Core\Lang::get('checkup_card2_desc') ?></p>
                    <span class="checkup-price"><?= App\Core\Lang::get('checkup_card2_price') ?></span>
                    <ul class="checkup-features">
                        <li><i class="fa-solid fa-check"></i> УЗИ органов малого таза</li>
                        <li><i class="fa-solid fa-check"></i> Маммография/УЗИ</li>
                        <li><i class="fa-solid fa-check"></i> Анализы на гормоны</li>
                        <li><i class="fa-solid fa-check"></i> Прием гинеколога</li>
                    </ul>
                    <a href="#bookingModal" class="btn btn-primary"
                        style="width: 100%;"><?= App\Core\Lang::get('hero_btn_start') ?></a>
                </div>

                <div class="checkup-card animate-up delay-2">
                    <div class="checkup-icon" style="color: #3b82f6;"><i class="fa-solid fa-mars"></i></div>
                    <h3><?= App\Core\Lang::get('checkup_card3_title') ?></h3>
                    <p><?= App\Core\Lang::get('checkup_card3_desc') ?></p>
                    <span class="checkup-price"><?= App\Core\Lang::get('checkup_card3_price') ?></span>
                    <ul class="checkup-features">
                        <li><i class="fa-solid fa-check"></i> УЗИ предстательной железы</li>
                        <li><i class="fa-solid fa-check"></i> Тест на ПСА</li>
                        <li><i class="fa-solid fa-check"></i> УЗИ органов БП</li>
                        <li><i class="fa-solid fa-check"></i> Прием уролога</li>
                    </ul>
                    <a href="#bookingModal" class="btn btn-primary"
                        style="width: 100%;"><?= App\Core\Lang::get('hero_btn_start') ?></a>
                </div>
            </div>
        </div>
    </section>

    
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
                    <h2><?= App\Core\Lang::get('about_title_1') ?><br><span
                            class="text-gradient"><?= App\Core\Lang::get('about_title_2') ?></span></h2>
                    <p>
                        <?= App\Core\Lang::get('about_text_1') ?>
                    </p>
                    <p>
                        <?= App\Core\Lang::get('about_text_2') ?>
                    </p>
                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check"></i> <?= App\Core\Lang::get('about_list_1') ?></li>
                        <li><i class="fa-solid fa-circle-check"></i> <?= App\Core\Lang::get('about_list_2') ?></li>
                        <li><i class="fa-solid fa-circle-check"></i> <?= App\Core\Lang::get('about_list_3') ?></li>
                    </ul>
                    <a href="#" class="btn btn-primary"
                        style="margin-top: 1rem;"><?= App\Core\Lang::get('about_btn') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews">
        <div class="container">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('rev_title') ?></h2>
                <p><?= App\Core\Lang::get('rev_desc') ?></p>
            </div>
            <div class="reviews-grid">
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review-text"><?= App\Core\Lang::get('rev_1_text') ?></p>
                    <div class="review-author">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Patient">
                        <div>
                            <h4>Гульнара А.</h4>
                            <span><?= App\Core\Lang::get('rev_1_role') ?></span>
                        </div>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review-text"><?= App\Core\Lang::get('rev_2_text') ?></p>
                    <div class="review-author">
                        <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Patient">
                        <div>
                            <h4>Арман С.</h4>
                            <span><?= App\Core\Lang::get('rev_2_role') ?></span>
                        </div>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review-text"><?= App\Core\Lang::get('rev_3_text') ?></p>
                    <div class="review-author">
                        <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="Patient">
                        <div>
                            <h4>Марат К.</h4>
                            <span><?= App\Core\Lang::get('rev_3_role') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="faq">
        <div class="container">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('faq_title') ?></h2>
                <p><?= App\Core\Lang::get('faq_desc') ?></p>
            </div>
            <div class="faq-accordion">
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_1_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_1_a') ?></p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_2_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_2_a') ?></p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_3_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_3_a') ?></p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_4_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_4_a') ?></p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_5_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_5_a') ?></p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span><?= App\Core\Lang::get('faq_6_q') ?></span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= App\Core\Lang::get('faq_6_a') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div class="container">
        <section id="symptom-checker" class="animate-up">
            <div class="section-title">
                <h2><?= App\Core\Lang::get('symptom_title') ?></h2>
                <p><?= App\Core\Lang::get('symptom_desc') ?></p>
            </div>

            <div style="max-width: 900px; margin: 0 auto; position: relative;">
                
                <div id="ai-scanner" class="scanner-overlay">
                    <div class="scanner-circle"></div>
                    <div class="scanning-text">MedTrack AI™ Анализ</div>
                    <div class="scanning-subtext">Сканирование симптомов... <span id="scan-progress">0%</span></div>
                </div>

                <h4 style="margin-bottom: 2rem; text-align: center; font-size: 1.5rem;">
                    <?= App\Core\Lang::get('symptom_select') ?>
                </h4>
                <div class="symptom-grid">
                    <label class="symptom-item">
                        <input type="checkbox" value="headache">
                        <i class="fa-solid fa-brain"></i>
                        <span><?= App\Core\Lang::get('symptom_head') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="fever">
                        <i class="fa-solid fa-temperature-three-quarters"></i>
                        <span><?= App\Core\Lang::get('symptom_fever') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="cough">
                        <i class="fa-solid fa-head-side-cough"></i>
                        <span><?= App\Core\Lang::get('symptom_cough') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="throat">
                        <i class="fa-solid fa-virus"></i>
                        <span>Боль в горле</span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="stomach">
                        <i class="fa-solid fa-notes-medical"></i>
                        <span><?= App\Core\Lang::get('symptom_stomach') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="heart">
                        <i class="fa-solid fa-heart-pulse"></i>
                        <span><?= App\Core\Lang::get('symptom_heart') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="fatigue">
                        <i class="fa-solid fa-battery-quarter"></i>
                        <span><?= App\Core\Lang::get('symptom_fatigue') ?></span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="back">
                        <i class="fa-solid fa-bone"></i>
                        <span>Боль в спине</span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="eyes">
                        <i class="fa-solid fa-eye"></i>
                        <span>Глаза</span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="skin">
                        <i class="fa-solid fa-hand-dots"></i>
                        <span>Сыпь/Кожа</span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="anxiety">
                        <i class="fa-solid fa-cloud-rain"></i>
                        <span>Тревожность</span>
                    </label>
                    <label class="symptom-item">
                        <input type="checkbox" value="joint">
                        <i class="fa-person-walking-cane"></i>
                        <span>Суставы</span>
                    </label>
                </div>

                <div style="text-align: center; margin-top: 3rem;">
                    <button id="analyzeSymptomsBtn" class="btn btn-primary"
                        style="padding: 1.2rem 4rem; font-size: 1.1rem; border-radius: 50px;">
                        <i class="fa-solid fa-microchip" style="margin-right: 12px;"></i>
                        <?= App\Core\Lang::get('symptom_btn') ?>
                    </button>
                    <p style="margin-top: 1rem; color: var(--text-muted); font-size: 0.9rem;">
                        <i class="fa-solid fa-check-circle" style="color: var(--primary);"></i> Powered by MedTrack AI
                        Engine
                    </p>
                </div>

                <div id="checkerResults" class="checker-results">
                    <div class="result-header">
                        <div class="result-score">
                            <span id="ai-confidence">98%</span>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 1.8rem;"><?= App\Core\Lang::get('symptom_result_title') ?>
                            </h3>
                            <p style="margin: 5px 0 0 0; color: var(--text-muted);">Анализ завершен успешно</p>
                        </div>
                    </div>

                    <div style="margin-bottom: 2rem;">
                        <h4 style="margin-bottom: 1rem; color: var(--primary);">Рекомендация ИИ:</h4>
                        <p id="res-desc" style="font-size: 1.2rem; line-height: 1.6;">
                            <?= App\Core\Lang::get('symptom_result_recommend') ?>
                        </p>
                    </div>

                    <div class="result-doctor-card">
                        <img id="res-doc-img" src="<?php echo BASE_URL; ?>/public/img/doctor1.png"
                            class="result-doctor-img" alt="Doctor">
                        <div>
                            <span
                                style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted);">Рекомендуемый
                                специалист</span>
                            <div class="result-doctor" id="res-doctor" style="margin: 0.2rem 0; font-size: 1.4rem;">-
                            </div>
                            <div style="color: var(--primary); font-size: 0.9rem;"><i class="fa-solid fa-star"></i> 4.9
                                (Лучший выбор)</div>
                        </div>
                        <div style="flex-grow: 1;"></div>
                        <a href="#bookingModal" class="btn btn-primary">Записаться</a>
                    </div>

                    <p
                        style="font-size: 0.85rem; color: var(--text-muted); opacity: 0.7; margin-top: 1rem; text-align: center;">
                        <i class="fa-solid fa-triangle-exclamation"></i> Важно: Результаты ИИ носят информационный
                        характер. Пожалуйста, проконсультируйтесь с врачом.
                    </p>
                </div>
            </div>
        </section>
    </div>

    
    <div id="docModalOverlay" class="doc-modal-overlay">
        <div class="doc-modal">
            <div class="doc-modal-close" onclick="closeDocModal()"><i class="fa-solid fa-xmark"></i></div>
            <div class="doc-modal-img">
                <img id="doc-modal-img" src="" alt="">
            </div>
            <div class="doc-modal-content">
                <span id="doc-modal-spec" class="doctor-specialty"></span>
                <h2 id="doc-modal-name"></h2>
                <div class="doc-stats" style="display: flex; gap: 2rem; margin: 1rem 0;">
                    <div><b style="color: var(--primary);">15+</b><br><small class="text-muted">Лет стажа</small></div>
                    <div><b style="color: var(--primary);">2000+</b><br><small class="text-muted">Пациентов</small>
                    </div>
                    <div><b style="color: var(--primary);">4.9</b><br><small class="text-muted">Рейтинг</small></div>
                </div>
                <p id="doc-modal-bio" class="text-muted" style="line-height: 1.8;"></p>
                <div style="margin-top: auto;">
                    <a href="./book" class="btn btn-primary" style="width: 100%;">Записаться на прием</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <section id="newsletter" class="animate-up">
            <div class="news-box">
                <h2><?= App\Core\Lang::get('news_title') ?></h2>
                <p><?= App\Core\Lang::get('news_desc') ?></p>
                <form class="news-form">
                    <input type="email" placeholder="<?= App\Core\Lang::get('news_placeholder') ?>" required>
                    <button type="submit" class="btn btn-primary"><?= App\Core\Lang::get('news_btn') ?></button>
                </form>
            </div>
        </section>
    </div>

    
    <div class="container" style="margin-top: 4rem;">
        <div id="map-container" class="animate-up">
            <div class="map-overlay-card">
                <h3><i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i> Astana Medical</h3>
                <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 1rem; line-height: 1.5;">
                    <?= App\Core\Lang::get('footer_addr') ?>
                </p>

                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                    <div
                        style="width: 32px; height: 32px; background: rgba(0,180,216,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--primary);">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <span style="font-size: 0.8rem; color: var(--text-muted); display: block;">Режим работы</span>
                        <strong style="font-size: 0.9rem;">08:00 - 20:00</strong>
                    </div>
                </div>

                <a href="https://yandex.kz/maps/-/CDQ0yGk~" target="_blank" class="map-btn-route">
                    <i class="fa-solid fa-diamond-turn-right" style="margin-right: 6px;"></i> Проложить маршрут
                </a>
            </div>
            <div id="map"></div>
        </div>
    </div>

    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <div class="brand" style="margin-bottom: 1rem;">
                        <i class="fa-solid fa-heart-pulse"></i> Astana Medical
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <?= App\Core\Lang::get('footer_desc') ?>
                    </p>
                    <div class="social-links">
                        <a href="https://www.instagram.com/kemalatdingoo?igsh=MXMwZmsyamZxZDQ3aw%3D%3D&utm_source=qr"
                            target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://t.me/Qazaqbalasyy" target="_blank" title="Telegram"><i
                                class="fa-brands fa-telegram"></i></a>
                        <a href="https://wa.me/message/TI26OQZECQ6YD1" target="_blank" title="WhatsApp"><i
                                class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4><?= App\Core\Lang::get('footer_col1') ?></h4>
                    <ul>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_find') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_book') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_services') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_cab') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_faq') ?></a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4><?= App\Core\Lang::get('footer_col2') ?></h4>
                    <ul>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_about') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_news') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_career') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_partners') ?></a></li>
                        <li><a href="#"><?= App\Core\Lang::get('footer_link_contact') ?></a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4><?= App\Core\Lang::get('footer_col3') ?></h4>
                    <ul>
                        <li><i class="fa-solid fa-location-dot" style="width: 20px; color: var(--primary);"></i>
                            <?= App\Core\Lang::get('footer_addr') ?></li>
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
                <p>&copy; <?php echo date('Y'); ?> Astana Medical. <?= App\Core\Lang::get('footer_rights') ?></p>
            </div>
        </div>
    </footer>

    
    <div class="modal-overlay" id="bookingModal">
        <div class="booking-modal">
            <i class="fa-solid fa-xmark close-modal" id="closeBooking"></i>

            <div class="wizard-header">
                <h2><?= App\Core\Lang::get('nav_appointment') ?></h2>
                <div class="steps-indicator">
                    <div class="step-pill active" data-step="1">1. <?= App\Core\Lang::get('doctors_title') ?></div>
                    <div class="step-pill" data-step="2">2. <?= App\Core\Lang::get('wizard_date') ?></div>
                    <div class="step-pill" data-step="3">3. <?= App\Core\Lang::get('wizard_contact') ?></div>
                </div>
            </div>

            <div class="wizard-body">
                
                <div class="wizard-step active" id="step1">
                    <h3 style="margin-bottom: 1.5rem;"><?= App\Core\Lang::get('wizard_select_doctor') ?></h3>
                    <div class="doctor-select-grid">
                        <div class="doctor-opt" data-doctor="Dr. Sokolova">
                            <img src="<?php echo BASE_URL; ?>/public/img/doctor1.png" alt="">
                            <div>
                                <strong><?= App\Core\Lang::get('doc1_name') ?></strong>
                                <p style="font-size: 0.75rem; color: var(--text-muted);">
                                    <?= App\Core\Lang::get('doc1_spec') ?>
                                </p>
                            </div>
                        </div>
                        <div class="doctor-opt" data-doctor="Dr. Ivanov">
                            <img src="<?php echo BASE_URL; ?>/public/img/doctor2.png" alt="">
                            <div>
                                <strong><?= App\Core\Lang::get('doc2_name') ?></strong>
                                <p style="font-size: 0.75rem; color: var(--text-muted);">
                                    <?= App\Core\Lang::get('doc2_spec') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="wizard-step" id="step2">
                    <h3 style="margin-bottom: 1.5rem;"><?= App\Core\Lang::get('wizard_select_date') ?></h3>
                    <div class="date-grid">
                        <div class="date-opt" data-date="12 Окт"><strong>12</strong><br><small>Окт</small></div>
                        <div class="date-opt" data-date="13 Окт"><strong>13</strong><br><small>Окт</small></div>
                        <div class="date-opt" data-date="14 Окт"><strong>14</strong><br><small>Окт</small></div>
                        <div class="date-opt" data-date="15 Окт"><strong>15</strong><br><small>Окт</small></div>
                        <div class="date-opt" data-date="16 Окт"><strong>16</strong><br><small>Окт</small></div>
                        <div class="date-opt" data-date="17 Окт"><strong>17</strong><br><small>Окт</small></div>
                    </div>
                </div>

                
                <div class="wizard-step" id="step3">
                    <h3 style="margin-bottom: 1.5rem;"><?= App\Core\Lang::get('wizard_final_details') ?></h3>
                    <input type="text" class="chat-input" placeholder="<?= App\Core\Lang::get('wizard_full_name') ?>"
                        style="width: 100%; margin-bottom: 1rem; padding: 1rem;">
                    <input type="tel" class="chat-input" placeholder="<?= App\Core\Lang::get('wizard_phone') ?>"
                        style="width: 100%; padding: 1rem;">
                </div>
            </div>

            <div class="wizard-footer">
                <button class="btn" id="prevStep"
                    style="background: rgba(0,0,0,0.05); color: var(--text-main); display: none;">Назад</button>
                <div style="flex-grow: 1;"></div>
                <button class="btn btn-primary" id="nextStep">Далее</button>
            </div>
        </div>
    </div>

    
    <div class="chat-widget" id="chatWidget">
        <button class="chat-trigger" id="chatTrigger">
            <i class="fa-solid fa-robot"></i>
        </button>
        <div class="chat-window">
            <div class="chat-header">
                <div class="ai-avatar"><i class="fa-solid fa-brain"></i></div>
                <div>
                    <h4>MedTrack AI</h4>
                    <p>Онлайн-помощник</p>
                </div>
            </div>
            <div class="chat-body" id="chatBody"></div>
            <div class="chat-footer">
                <input type="text" class="chat-input" placeholder="Введите ваш вопрос..." id="chatInput">
                <button class="chat-trigger" style="width: 40px; height: 40px; font-size: 1rem;">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    
    <button class="back-to-top" id="backToTop" title="Наверх">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        
        
        (function () {
            const removeLoader = () => {
                const loader = document.getElementById('preloader');
                if (loader) loader.classList.add('loaded');
            };
            
            setTimeout(removeLoader, 3000);
            window.addEventListener('load', removeLoader);
        })();

        
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const icon = navToggle.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-xmark');
        });

        
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;

                
                document.querySelectorAll('.faq-item').forEach(i => {
                    if (i !== item) i.classList.remove('active');
                });

                item.classList.toggle('active');
            });
        });

        
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
            });
        }

        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

        document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));

        
        const chatWidget = document.getElementById('chatWidget');
        const chatTrigger = document.getElementById('chatTrigger');
        const chatBody = document.getElementById('chatBody');
        let initialGreetingSent = false;

        chatTrigger.addEventListener('click', () => {
            chatWidget.classList.toggle('active');
            if (chatWidget.classList.contains('active') && !initialGreetingSent) {
                setTimeout(() => {
                    const msg = document.createElement('div');
                    msg.className = 'chat-msg msg-ai';
                    msg.innerHTML = 'Здравствуйте! Я интеллектуальный помощник клиники Astana Medical. Чем я могу вам помочь сегодня?';
                    chatBody.appendChild(msg);
                    initialGreetingSent = true;
                }, 600);
            }
        });

        
        const btt = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) btt.classList.add('show');
            else btt.classList.remove('show');
        });
        
        const progress = document.getElementById('readingProgress');
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progress.style.width = scrolled + "%";
        });

        
        document.querySelector('.news-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button');
            const originalText = btn.innerText;
            btn.innerText = '✓ Готово';
            btn.style.background = '#10b981';
            e.target.reset();
            setTimeout(() => {
                btn.innerText = originalText;
                btn.style.background = '';
            }, 3000);
        });

        
        const animateCounters = () => {
            const counters = document.querySelectorAll('.counter');
            const speed = 200; 

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText.replace(/[^\d.]/g, '');
                    const suffix = counter.getAttribute('data-suffix') || '';
                    const format = counter.getAttribute('data-format') || '';

                    
                    const inc = target / speed;

                    if (count < target) {
                        const nextCount = Math.ceil(count + inc);
                        let displayValue = nextCount;

                        if (format === 'short') {
                            if (nextCount >= 1000000) displayValue = (nextCount / 1000000).toFixed(0) + 'M';
                            else if (nextCount >= 1000) displayValue = (nextCount / 1000).toFixed(0) + 'K';
                        }

                        counter.innerText = displayValue + suffix;
                        setTimeout(updateCount, 15);
                    } else {
                        let finalDisplay = target;
                        if (format === 'short') {
                            if (target >= 1000000) finalDisplay = (target / 1000000).toFixed(0) + 'M';
                            else if (target >= 1000) finalDisplay = (target / 1000).toFixed(0) + 'K';
                        }
                        counter.innerText = finalDisplay + suffix;
                    }
                };

                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        updateCount();
                        observer.unobserve(counter);
                    }
                }, { threshold: 1 });

                observer.observe(counter);
            });
        };

        animateCounters();

        btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        
        const bookingModal = document.getElementById('bookingModal');
        const closeBooking = document.getElementById('closeBooking');
        const nextStep = document.getElementById('nextStep');
        const prevStep = document.getElementById('prevStep');
        let currentStep = 1;

        const openBooking = () => {
            bookingModal.classList.add('active');
            updateStep(1);
        };

        
        document.querySelectorAll('a[href="#"], .btn-primary').forEach(btn => {
            if (btn.innerText.includes('Записаться') || btn.innerText.includes('запись') || btn.innerText.includes('Appointment')) {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openBooking();
                });
            }
        });

        closeBooking.addEventListener('click', () => bookingModal.classList.remove('active'));

        
        const initMap = () => {
            const coords = [51.1283, 71.4305]; 

            
            const mapContainer = document.getElementById('map');
            if (!mapContainer) return;

            
            mapContainer.style.height = '500px';
            mapContainer.style.width = '100%';
            mapContainer.style.background = '#e5e7eb';
            mapContainer.style.zIndex = '1';

            const map = L.map('map', {
                scrollWheelZoom: false,
                zoomControl: false
            }).setView(coords, 15);

            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap',
                maxZoom: 19
            }).addTo(map);

            
            setTimeout(() => { map.invalidateSize(); }, 500);
            setTimeout(() => { map.invalidateSize(); }, 2000); 

            L.control.zoom({
                position: 'bottomright'
            }).addTo(map);

            const customIcon = L.divIcon({
                className: 'custom-div-icon',
                html: `<div style="background-color: var(--primary); width: 40px; height: 40px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); display: flex; align-items: center; justify-content: center; border: 3px solid white; box-shadow: 0 4px 15px rgba(0,180,216,0.4);">
                        <i class="fa-solid fa-heart-pulse" style="color: white; transform: rotate(45deg); font-size: 1.2rem;"></i>
                       </div>`,
                iconSize: [40, 40],
                iconAnchor: [20, 40]
            });

            L.marker(coords, { icon: customIcon }).addTo(map)
                .bindPopup('<strong style="font-family: Outfit;">Astana Medical</strong><br>Мангилик Ел, 55')
                .openPopup();
        };

        
        
        const symptomItems = document.querySelectorAll('.symptom-item');
        
        const analyzeBtn = document.getElementById('analyzeSymptomsBtn') || document.getElementById('analyzeSymptoms');
        const resultsDiv = document.getElementById('checkerResults');
        const scannerOverlay = document.getElementById('ai-scanner');

        
        const resDoctor = document.getElementById('res-doctor');
        const resDesc = document.getElementById('res-desc');
        const aiConfidence = document.getElementById('ai-confidence');
        const resDocImg = document.getElementById('res-doc-img');
        const scanProgress = document.getElementById('scan-progress');

        
        
        symptomItems.forEach(item => {
            
            
            
            const checkbox = item.querySelector('input');

            checkbox.addEventListener('change', () => {
                item.classList.toggle('active', checkbox.checked);
            });
        });

        if (analyzeBtn) {
            analyzeBtn.addEventListener('click', () => {
                const selected = Array.from(document.querySelectorAll('.symptom-item input:checked')).map(i => i.value);

                if (selected.length === 0) {
                    alert('Пожалуйста, выберите хотя бы один симптом для анализа.');
                    return;
                }

                
                if (scannerOverlay) scannerOverlay.classList.add('active');

                
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.floor(Math.random() * 5) + 3;
                    if (progress > 99) progress = 99;
                    if (scanProgress) scanProgress.innerText = progress + '%';
                }, 100);

                
                setTimeout(() => {
                    clearInterval(interval);
                    if (scanProgress) scanProgress.innerText = '100%';

                    
                    let doctor = "Терапевт";
                    let img = "doctor1.png";
                    let desc = "На основе ваших симптомов, рекомендуется первичный осмотр у терапевта для уточнения диагноза и назначения анализов.";
                    let confidence = 89 + Math.floor(Math.random() * 10);

                    if (selected.includes('heart')) {
                        doctor = "Кардиолог";
                        img = "doctor2.png";
                        desc = "Обнаружены симптомы, которые могут указывать на проблемы с сердцем. Рекомендуем не откладывать визит.";
                        confidence = 96;
                    }
                    else if (selected.includes('head') && !selected.includes('fever')) {
                        doctor = "Невролог";
                        img = "doctor3.png";
                        desc = "Частые головные боли могут быть признаком переутомления или сосудистых изменений. Невролог проведет диагностику.";
                        confidence = 92;
                    }
                    else if (selected.includes('stomach')) {
                        doctor = "Гастроэнтеролог";
                        img = "doctor2.png";
                        desc = "Проблемы с пищеварением требуют осмотра специалиста. Рекомендуется УЗИ брюшной полости.";
                        confidence = 94;
                    }
                    else if (selected.includes('eyes')) {
                        doctor = "Офтальмолог";
                        img = "doctor1.png";
                        desc = "Симптомы указывают на проблемы со зрением. Рекомендуется проверка зрения и глазного дна.";
                        confidence = 95;
                    }
                    else if (selected.includes('skin')) {
                        doctor = "Дерматолог";
                        img = "doctor2.png";
                        desc = "Кожные высыпания требуют визуального осмотра специалистом для исключения аллергии или инфекции.";
                        confidence = 93;
                    }
                    else if (selected.includes('back') || selected.includes('joint')) {
                        doctor = "Травматолог-Ортопед";
                        img = "doctor3.png";
                        desc = "Боли в спине или суставах могут быть признаком остеохондроза или воспаления. Нужен снимок и осмотр.";
                        confidence = 91;
                    }
                    else if (selected.includes('anxiety')) {
                        doctor = "Психотерапевт";
                        img = "doctor1.png";
                        desc = "Повышенная тревожность требует консультации специалиста для восстановления ментального здоровья.";
                        confidence = 88;
                    }
                    else if (selected.includes('throat') || ((selected.includes('fever') && selected.includes('cough')))) {
                        doctor = "ЛОР / Терапевт";
                        img = "doctor1.png";
                        desc = "Боль в горле и кашель часто сопровождают ОРВИ. Рекомендуется осмотр для исключения ангины или бронхита.";
                        confidence = 90;
                    }

                    
                    if (resDoctor) resDoctor.innerText = doctor;
                    if (resDesc) resDesc.innerText = desc;
                    if (aiConfidence) aiConfidence.innerText = confidence + '%';

                    
                    const scoreRing = document.querySelector('.result-score');
                    if (scoreRing) {
                        scoreRing.style.background = `conic-gradient(var(--primary) ${confidence}%, rgba(0,0,0,0.05) 0)`;
                    }

                    
                    if (resDocImg) resDocImg.src = `<?php echo BASE_URL; ?>/public/img/${img}`;

                    
                    if (scannerOverlay) scannerOverlay.classList.remove('active');
                    resultsDiv.style.display = 'block';

                    
                    resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

                    
                }, 3000);
            });
        }

        
        document.addEventListener('DOMContentLoaded', initMap);

        const updateStep = (step) => {
            currentStep = step;
            document.querySelectorAll('.wizard-step').forEach(s => s.classList.remove('active'));
            document.getElementById('step' + step).classList.add('active');

            document.querySelectorAll('.step-pill').forEach(pill => {
                pill.classList.remove('active');
                if (parseInt(pill.dataset.step) <= step) pill.classList.add('active');
            });

            prevStep.style.display = step === 1 ? 'none' : 'block';
            nextStep.innerText = step === 3 ? 'Завершить' : 'Далее';
        };

        nextStep.addEventListener('click', () => {
            if (currentStep < 3) {
                updateStep(currentStep + 1);
            } else {
                alert('Запись успешно создана! Наши менеджеры свяжутся с вами.');
                bookingModal.classList.remove('active');
            }
        });

        prevStep.addEventListener('click', () => {
            if (currentStep > 1) updateStep(currentStep - 1);
        });

        
        document.querySelectorAll('.doctor-opt').forEach(opt => {
            opt.addEventListener('click', () => {
                document.querySelectorAll('.doctor-opt').forEach(o => o.classList.remove('selected'));
                opt.classList.add('selected');
            });
        });

        document.querySelectorAll('.date-opt').forEach(opt => {
            opt.addEventListener('click', () => {
                document.querySelectorAll('.date-opt').forEach(o => o.classList.remove('selected'));
                opt.classList.add('selected');
            });
        });

        

        
        document.querySelectorAll('.doctor-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (centerY - y) / 25; 
                const rotateY = (x - centerX) / 25; 

                card.style.transform = `translateY(-15px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = `translateY(0) rotateX(0) rotateY(0)`;
            });
        });
    </script>

    
    <div class="ai-trigger-fab" id="openAI">
        <i class="fa-solid fa-robot"></i>
    </div>

    
    <div id="homeAiChat" class="ai-chat-widget">
        <div class="chat-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-robot" style="color: var(--primary);"></i>
                <span>Astana Med AI</span>
                <span class="ai-status-dot"></span>
            </div>
            <button id="closeHomeAi"
                style="background:none; border:none; color: var(--text-main); cursor:pointer; font-size: 1.2rem;">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="homeChatMessages" class="chat-messages">
            <div class="message ai">Здравствуйте! Я интеллектуальный помощник клиники Astana Medical. Как я могу помочь
                вам сегодня?</div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="homeAiInput" placeholder="Задайте свой вопрос...">
            <button id="homeSendAiBtn"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    <script>
        
        const openAI = document.getElementById('openAI');
        const closeHomeAi = document.getElementById('closeHomeAi');
        const homeAiChat = document.getElementById('homeAiChat');
        const homeAiInput = document.getElementById('homeAiInput');
        const homeSendAiBtn = document.getElementById('homeSendAiBtn');
        const homeChatMessages = document.getElementById('homeChatMessages');

        const toggleHomeChat = (show) => {
            if (show) {
                homeAiChat.style.display = 'flex';
                setTimeout(() => {
                    homeAiChat.classList.add('active');
                    openAI.style.transform = 'scale(0) rotate(90deg)';
                }, 10);
            } else {
                homeAiChat.classList.remove('active');
                setTimeout(() => {
                    homeAiChat.style.display = 'none';
                    openAI.style.transform = 'scale(1) rotate(0)';
                }, 400);
            }
        };

        if (openAI) openAI.addEventListener('click', () => toggleHomeChat(true));
        if (closeHomeAi) closeHomeAi.addEventListener('click', () => toggleHomeChat(false));

        const addHomeMessage = (text, sender) => {
            const msg = document.createElement('div');
            msg.className = `message ${sender} page-fade-in`;
            msg.innerText = text;
            homeChatMessages.appendChild(msg);
            homeChatMessages.scrollTop = homeChatMessages.scrollHeight;
        };

        const handleHomeAiSend = async () => {
            const query = homeAiInput.value.trim();
            if (!query) return;

            addHomeMessage(query, 'user');
            homeAiInput.value = '';

            try {
                const response = await fetch('<?php echo BASE_URL; ?>/api/ai-chat', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: query })
                });
                const data = await response.json();
                addHomeMessage(data.response || data.error, 'ai');
            } catch (error) {
                addHomeMessage("Извините, сейчас я не могу ответить. Пожалуйста, попробуйте позже.", "ai");
            }
        };

        if (homeSendAiBtn) homeSendAiBtn.addEventListener('click', handleHomeAiSend);
        if (homeAiInput) homeAiInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') handleHomeAiSend();
        });

        
        const updateDashboardPreview = () => {
            const pulseEl = document.getElementById('preview-pulse');
            const oxygenEl = document.getElementById('preview-oxygen');
            const caloriesEl = document.getElementById('preview-calories');

            if (pulseEl) {
                const currentPulse = 70 + Math.floor(Math.random() * 8);
                pulseEl.innerHTML = `${currentPulse} <span style="font-size: 0.8rem; color: var(--text-muted);">уд/мин</span>`;
            }

            if (oxygenEl) {
                const currentOxygen = 97 + Math.floor(Math.random() * 3);
                oxygenEl.innerHTML = `${currentOxygen} <span style="font-size: 0.8rem; color: var(--text-muted);">%</span>`;
            }

            if (caloriesEl) {
                const currentCals = 1200 + Math.floor(Math.random() * 50);
                caloriesEl.innerHTML = currentCals.toLocaleString();
            }
        };

        setInterval(updateDashboardPreview, 3000);
    </script>
</body>

</html>