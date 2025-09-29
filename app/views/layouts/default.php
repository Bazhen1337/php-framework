<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= get_csrf_meta() ?>
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('source/system/css/bootstrap.css'); ?>">
</head>
<header>
    <?php if ($this->component !== '') {
        echo $this->component;
    } ?>
</header>
<body>

<?php get_alerts(); ?>
<?= $this->content; ?>

<script src="<?= base_url('source/system/js/bootstrap.js'); ?>"></script>
</body>
</html>