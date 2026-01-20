<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Astana Medical | Профессиональная забота'; ?></title>
    <meta name="description"
        content="<?php echo $metaDescription ?? 'Astana Medical - современная цифровая клиника в Астане. Запись к врачу онлайн, электронная карта и мониторинг здоровья.'; ?>">
    <meta name="keywords"
        content="<?php echo $metaKeywords ?? 'клиника астана, запись к врачу, медицинский центр, Astana Medical, медицина онлайн'; ?>">

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo BASE_URL; ?>">
    <meta property="og:title" content="<?php echo $pageTitle ?? 'Astana Medical | Профессиональная забота'; ?>">
    <meta property="og:description"
        content="<?php echo $metaDescription ?? 'Astana Medical - современная цифровая клиника в Астане. Запись к врачу онлайн, электронная карта и мониторинг здоровья.'; ?>">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/public/img/og-image.jpg">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php if (isset($extraStyles))
        echo $extraStyles; ?>
</head>

<body class="page-fade-in" style="<?php echo $bodyStyle ?? ''; ?>">