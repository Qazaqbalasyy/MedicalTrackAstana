<?php
$pageTitle = 'Запись к врачу | Astana Medical';
$bodyStyle = 'background-color: #f8fafc;';
$extraStyles = '<style>
        .booking-container {
            max-width: 600px;
            margin: 4rem auto;
            padding: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            animation: slideUp 0.5s ease;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>';

require __DIR__ . '/layouts/header.php';
?>

<nav class="navbar" style="background: white; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
    <div class="container nav-content">
        <a href="./dashboard" class="brand">
            <i class="fa-solid fa-arrow-left"></i> Назад в кабинет
        </a>
    </div>
</nav>

<div class="container">
    <div class="booking-container">
        <h2 style="margin-bottom: 1.5rem; text-align: center;">Запись на прием</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="./book" method="POST">
            <div class="form-group">
                <label>Выберите врача</label>
                <select name="doctor" class="form-control" required>
                    <option value="">-- Выберите специалиста --</option>
                    <option value="Д-р Алимжан Сериков|Кардиолог">Д-р Алимжан Сериков (Кардиолог)</option>
                    <option value="Д-р Елена Соколова|Терапевт">Д-р Елена Соколова (Терапевт)</option>
                    <option value="Д-р Руслан Маемеров|Невролог">Д-р Руслан Маемеров (Невролог)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Дата приема</label>
                <input type="date" name="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group">
                <label>Время</label>
                <select name="time" class="form-control" required>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem;">Подтвердить
                запись</button>
        </form>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>