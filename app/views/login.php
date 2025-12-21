<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход | Astana Medical</title>
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
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .login-header {
            margin-bottom: 2rem;
        }

        .login-header i {
            font-size: 3rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
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
            padding: 1rem;
            font-size: 1.1rem;
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
        <i class="fa-solid fa-arrow-left"></i> Назад
    </a>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fa-solid fa-heart-pulse"></i>
                <h2>С возвращением</h2>
                <p style="color: var(--text-muted);">Войдите в личный кабинет</p>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div
                    style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 0.8rem; border-radius: 12px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form action="./login" method="POST">

                <div class="form-group">
                    <label>Еmail или Телефон</label>
                    <input type="text" name="email" class="form-control" placeholder="+7 (700) 000-00-00" required>
                </div>

                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="form-group" style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; margin:0;">
                        <input type="checkbox"> Запомнить меня
                    </label>
                    <a href="#" style="color: var(--primary); text-decoration: none;">Забыли пароль?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-full">
                    Войти
                </button>
            </form>

            <div style="margin-top: 2rem; font-size: 0.9rem; color: var(--text-muted);">
                Нет аккаунта? <a href="./register"
                    style="color: var(--primary); font-weight: 600; text-decoration: none;">Зарегистрироваться</a>
            </div>
        </div>
    </div>
</body>

</html>