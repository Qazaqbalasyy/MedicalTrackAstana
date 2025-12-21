<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация | Astana Medical</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            background: url('<?php echo BASE_URL; ?>/public/img/astana-bg.png') no-repeat center center/cover;
        }

        .login-container::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(240, 249, 255, 0.7);
            backdrop-filter: blur(10px);
            z-index: 0;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .login-header {
            margin-bottom: 2rem;
        }

        .login-header i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
            background: white;
        }

        .btn-full {
            width: 100%;
            padding: 0.9rem;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .back-link {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 10;
            color: var(--text-main);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50px;
            transition: all 0.3s;
        }

        .back-link:hover {
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <a href="./" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> На главную
    </a>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fa-solid fa-file-medical"></i>
                <h2>Новый пациент</h2>
                <p style="color: var(--text-muted);">Создайте аккаунт для доступа к услугам</p>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div
                    style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 0.8rem; border-radius: 12px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form action="./register" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="name" class="form-control" placeholder="Иван" required>
                    </div>
                    <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="surname" class="form-control" placeholder="Иванов" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="ivan@example.com" required>
                </div>

                <!-- 
                <div class="form-group">
                    <label>ИИН (для интеграции)</label>
                    <input type="text" name="iin" class="form-control" placeholder="000000000000" maxlength="12" >
                </div>
                 -->

                <div class="form-group">
                    <label>Номер телефона</label>
                    <input type="tel" name="phone" class="form-control" placeholder="+7 (700) 000-00-00">
                </div>

                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary btn-full">
                    Зарегистрироваться
                </button>
            </form>

            <div style="margin-top: 1.5rem; font-size: 0.9rem; color: var(--text-muted);">
                Уже есть аккаунт? <a href="./login"
                    style="color: var(--primary); font-weight: 600; text-decoration: none;">Войти</a>
            </div>
        </div>
    </div>
</body>

</html>