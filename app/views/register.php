<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый пациент | Astana Medical</title>
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
            overflow-x: hidden;
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
            width: 400px;
            height: 400px;
            background: var(--accent);
            filter: blur(150px);
            opacity: 0.1;
            z-index: 0;
        }

        .glow-1 {
            top: -100px;
            left: -100px;
        }

        .glow-2 {
            bottom: -100px;
            right: -100px;
        }

        .auth-card {
            background: var(--auth-card);
            border: 1px solid var(--auth-border);
            padding: 3rem;
            border-radius: 40px;
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .auth-icon-box {
            width: 70px;
            height: 70px;
            background: rgba(0, 180, 216, 0.1);
            border: 1px solid rgba(0, 180, 216, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--accent);
            font-size: 2rem;
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.1);
        }

        .auth-header h2 {
            font-size: 2.2rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .auth-header p {
            color: #94a3b8;
            margin-top: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #94a3b8;
        }

        .form-control {
            width: 100%;
            background: var(--auth-input);
            border: 1px solid var(--auth-border);
            border-radius: 16px;
            padding: 0.9rem 1.2rem;
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
            background: #111827;
        }

        .btn-auth {
            width: 100%;
            background: var(--accent);
            color: #020617;
            border: none;
            padding: 1.1rem;
            border-radius: 18px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-top: 1rem;
            box-shadow: 0 10px 25px rgba(0, 180, 216, 0.3);
        }

        .btn-auth:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 180, 216, 0.5);
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            color: #94a3b8;
            font-size: 0.95rem;
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
            height: 70px;
            background: var(--auth-input);
            border: 2px solid var(--auth-border);
            border-radius: 16px;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent);
        }

        .code-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 20px var(--accent-glow);
        }

        
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(0, 180, 216, 0.1);
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
            padding: 1.5rem 2rem;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
            transform: translateX(120%);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 2000;
        }

        .auth-toast.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 40px;
            height: 40px;
            background: rgba(0, 180, 216, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }
    </style>
</head>

<body>
    
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    
    <div id="loading" class="loading-overlay">
        <div class="loader"></div>
        <h3 id="loading-text">Проверка данных...</h3>
    </div>

    
    <div id="auth-toast" class="auth-toast">
        <div class="toast-icon">
            <i class="fa-brands fa-whatsapp"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 1rem;">WhatsApp уведомление</h4>
            <p id="toast-msg" style="margin: 0; opacity: 0.7; font-size: 0.9rem;">Код подтверждения: 1234</p>
        </div>
    </div>

    <div class="auth-wrapper">
        <div class="auth-card" id="reg-card">

            
            <div id="form-step">
                <div class="auth-header">
                    <div class="auth-icon-box">
                        <i class="fa-solid fa-file-medical"></i>
                    </div>
                    <h2>Новый пациент</h2>
                    <p>Создайте аккаунт для доступа к услугам</p>
                </div>

                <form id="reg-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" class="form-control" placeholder="Арман" required>
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            <input type="text" name="surname" class="form-control" placeholder="Амангельдиев" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="arman@example.kz" required>
                    </div>

                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+7 (705) 000-00-00"
                            id="reg-phone">
                    </div>

                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-auth">
                        Зарегистрироваться
                    </button>
                    <div class="auth-footer">
                        Уже есть аккаунт? <a href="./login">Войти</a>
                    </div>
                </form>
            </div>

            
            <div id="verify-step">
                <div class="auth-header">
                    <div class="auth-icon-box">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h2>Введите код</h2>
                    <p id="verify-sub">Мы отправили 4-значный код на ваш WhatsApp +7 (705) ***-**-00</p>
                </div>

                <div class="code-inputs">
                    <input type="text" maxlength="1" class="code-input" data-index="1">
                    <input type="text" maxlength="1" class="code-input" data-index="2">
                    <input type="text" maxlength="1" class="code-input" data-index="3">
                    <input type="text" maxlength="1" class="code-input" data-index="4">
                </div>

                <button id="verify-btn" class="btn-auth">
                    Подтвердить и войти
                </button>
                <div class="auth-footer">
                    Не пришел код? <a href="#" onclick="alert('Код отправлен повторно!')">Отправить еще раз</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        const regForm = document.getElementById('reg-form');
        const formStep = document.getElementById('form-step');
        const verifyStep = document.getElementById('verify-step');
        const loading = document.getElementById('loading');
        const loadingText = document.getElementById('loading-text');
        const toast = document.getElementById('auth-toast');
        const toastMsg = document.getElementById('toast-msg');
        const regPhone = document.getElementById('reg-phone');
        const verifySub = document.getElementById('verify-sub');

        let generatedCode = "1234";

        regForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const phone = regPhone.value || "+7 (705) 000-00-00";
            verifySub.innerText = `Мы отправили 4-значный код на ваш WhatsApp ${phone}`;

            
            loading.style.display = 'flex';
            loadingText.innerText = "Шифрование данных...";

            setTimeout(() => {
                loadingText.innerText = "Создание личного кабинета...";
            }, 1000);

            setTimeout(() => {
                loadingText.innerText = "Отправка кода подтверждения...";

                
                setTimeout(() => {
                    toast.classList.add('show');
                    generatedCode = Math.floor(1000 + Math.random() * 9000).toString();
                    toastMsg.innerText = `Ваш код для Astana Medical: ${generatedCode}`;

                    setTimeout(() => toast.classList.remove('show'), 8000);
                }, 500);

                
                setTimeout(() => {
                    loading.style.display = 'none';
                    formStep.style.display = 'none';
                    verifyStep.style.display = 'block';
                }, 2000);

            }, 2500);
        });

        
        const codeInputs = document.querySelectorAll('.code-input');
        codeInputs.forEach((input, idx) => {
            input.addEventListener('keyup', (e) => {
                if (e.key >= 0 && e.key <= 9) {
                    if (idx < 3) codeInputs[idx + 1].focus();
                } else if (e.key === 'Backspace') {
                    if (idx > 0) codeInputs[idx - 1].focus();
                }
            });
        });

        const verifyBtn = document.getElementById('verify-btn');
        verifyBtn.addEventListener('click', () => {
            const enteredCode = Array.from(codeInputs).map(i => i.value).join('');

            if (enteredCode === generatedCode) {
                loading.style.display = 'flex';
                loadingText.innerText = "Успешно! Вход в кабинет...";

                setTimeout(() => {
                    
                    window.location.href = './dashboard';
                }, 1500);
            } else {
                alert("Неверный код! Пожалуйста, проверьте WhatsApp.");
            }
        });
    </script>
</body>

</html>