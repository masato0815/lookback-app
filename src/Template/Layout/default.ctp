<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
振り返りサイト
    </title>
    <?= $this->Html->meta('icon') ?>

    
</head>
<body>
<?=$this->element('header') ?>
        <?= $this->fetch('content') ?>
</body>
</html>
