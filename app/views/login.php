<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход | Astana Medical</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --auth-bg: #0f172a;
            --auth-card: #1e293b;
            --auth-input: #0f172a;
            --auth-border: rgba(255, 255, 255, 0.08);
            --auth-text: #f1f5f9;
            --accent: #00b4d8;
            --accent-glow: rgba(0, 180, 216, 0.4);
        }

        body {
            background-color: #020617;
            color: var(--auth-text);
            font-family: 'Outfit', sans-serif;
            margin: 0;
            overflow: hidden;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: radial-gradient(circle at 50% 50%, #1e293b 0%, #020617 100%);
            position: relative;
        }

        .glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: var(--accent);
            filter: blur(180px);
            opacity: 0.1;
            z-index: 0;
        }

        .glow-1 {
            top: -200px;
            left: -100px;
        }

        .auth-card {
            background: var(--auth-card);
            border: 1px solid var(--auth-border);
            padding: 3.5rem;
            border-radius: 40px;
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            transition: all 0.5s ease;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .auth-icon-box {
            width: 80px;
            height: 80px;
            background: rgba(0, 180, 216, 0.1);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--accent);
            font-size: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.1);
        }

        .auth-header h2 {
            font-size: 2.2rem;
            margin: 0;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-size: 0.9rem;
            color: #94a3b8;
        }

        .form-control {
            width: 100%;
            background: var(--auth-input);
            border: 1px solid var(--auth-border);
            border-radius: 18px;
            padding: 1rem 1.4rem;
            color: white;
            font-family: inherit;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px var(--accent-glow);
        }

        .btn-auth {
            width: 100%;
            background: var(--accent);
            color: #020617;
            border: none;
            padding: 1.2rem;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-top: 1rem;
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 180, 216, 0.4);
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            color: #94a3b8;
        }

        .auth-footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        
        #verify-step {
            display: none;
        }

        .code-inputs {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .code-input {
            width: 60px;
            height: 75px;
            background: var(--auth-input);
            border: 2px solid var(--auth-border);
            border-radius: 18px;
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--accent);
        }

        
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(12px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(0, 180, 216, 0.1);
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 1.5rem;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        
        .auth-toast {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: #1e293b;
            border-left: 5px solid var(--accent);
            padding: 1.2rem 2rem;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
            transform: translateX(120%);
            transition: transform 0.4s;
            z-index: 2000;
        }

        .auth-toast.show {
            transform: translateX(0);
        }
    </style>
</head>

<body>
    <div class="glow glow-1"></div>

    <div id="loading" class="loading-overlay">
        <div class="loader"></div>
        <h3 id="loading-text">Авторизация...</h3>
    </div>

    
    <div id="auth-toast" class="auth-toast">
        <div
            style="width: 40px; height: 40px; background: rgba(0,180,216,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--accent);">
            <i class="fa-brands fa-whatsapp"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 1rem;">WhatsApp</h4>
            <p id="toast-msg" style="margin: 0; opacity: 0.7; font-size: 0.9rem;">Ваш код входа: 1234</p>
        </div>
    </div>

    <div class="auth-wrapper">
        <div class="auth-card">

            
            <div id="login-step">
                <div class="auth-header">
                    <div class="auth-icon-box">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <h2>С возвращением</h2>
                    <p>Войдите для управления здоровьем</p>
                </div>

                <form id="login-form">
                    <div class="form-group">
                        <label>Email или Телефон</label>
                        <input type="text" id="login-id" class="form-control" placeholder="+7 (705) 000-00-00" required>
                    </div>

                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 1.5rem;">
                        <label style="cursor: pointer;"><input type="checkbox"> Запомнить меня</label>
                        <a href="#" style="color: var(--accent); text-decoration: none;">Забыли пароль?</a>
                    </div>

                    <button type="submit" class="btn-auth">
                        Продолжить
                    </button>
                    <div class="auth-footer">
                        Нет аккаунта? <a href="./register">Создать сейчас</a>
                    </div>
                </form>
            </div>

            
            <div id="verify-step">
                <div class="auth-header">
                    <div class="auth-icon-box">
                        <i class="fa-solid fa-lock-open"></i>
                    </div>
                    <h2>Подтверждение</h2>
                    <p id="verify-sub">Код отправлен на ваш WhatsApp</p>
                </div>

                <div class="code-inputs">
                    <input type="text" maxlength="1" class="code-input">
                    <input type="text" maxlength="1" class="code-input">
                    <input type="text" maxlength="1" class="code-input">
                    <input type="text" maxlength="1" class="code-input">
                </div>

                <button id="verify-btn" class="btn-auth">
                    Войти в кабинет
                </button>
                <div class="auth-footer">
                    <a href="#" onclick="location.reload()">Вернуться назад</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        const loginForm = document.getElementById('login-form');
        const loginStep = document.getElementById('login-step');
        const verifyStep = document.getElementById('verify-step');
        const loading = document.getElementById('loading');
        const loadingText = document.getElementById('loading-text');
        const toast = document.getElementById('auth-toast');
        const toastMsg = document.getElementById('toast-msg');

        let generatedCode = "1234";

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            loading.style.display = 'flex';
            loadingText.innerText = "Проверка данных...";

            setTimeout(() => {
                loadingText.innerText = "Генерация защищенного кода...";

                setTimeout(() => {
                    toast.classList.add('show');
                    generatedCode = Math.floor(1000 + Math.random() * 9000).toString();
                    toastMsg.innerText = `Ваш код входа Astana Medical: ${generatedCode}`;
                    setTimeout(() => toast.classList.remove('show'), 7000);
                }, 500);

                setTimeout(() => {
                    loading.style.display = 'none';
                    loginStep.style.display = 'none';
                    verifyStep.style.display = 'block';
                }, 1500);
            }, 1000);
        });

        const codeInputs = document.querySelectorAll('.code-input');
        codeInputs.forEach((input, idx) => {
            input.addEventListener('keyup', (e) => {
                if (e.key >= 0 && e.key <= 9 && idx < 3) codeInputs[idx + 1].focus();
                if (e.key === 'Backspace' && idx > 0) codeInputs[idx - 1].focus();
            });
        });

        document.getElementById('verify-btn').addEventListener('click', () => {
            const entered = Array.from(codeInputs).map(i => i.value).join('');
            if (entered === generatedCode) {
                loading.style.display = 'flex';
                loadingText.innerText = "Доступ разрешен. Перенаправление...";
                setTimeout(() => window.location.href = './dashboard', 1500);
            } else {
                alert("Неверный код!");
            }
        });
    </script>
</body>

</html>