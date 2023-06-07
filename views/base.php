<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./statics/styles.css" />
    <title> <?=$__title ?? 'Untitled' ?> </title>

    <?php foreach($__styles ?? [] as $s): ?>
        <link rel="stylesheet" href="./statics/<?=str_replace('.', '/', $s)?>.css" />
    <?php endforeach; ?>
</head>
<body>
    <?php require_once($__view); ?>

    <?php foreach($__javascripts ?? [] as $j): ?>
        <script src="./statics/<?=str_replace('.', '/', $j)?>.js"></script>
    <?php endforeach; ?>
</body>
</html>