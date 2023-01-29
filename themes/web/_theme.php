<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= CONF_SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/web/css/styles.css">
    <script type="text/javascript" src="<?= url("assets/web/scripts/scripts.js"); ?>" async></script>
</head>
<body>
<nav>

<nav class="navMenu">
      <a href ="<?= url("") ?>">Home</a>
      <a href="<?= url("work") ?>">Work</a>
      <a href="<?= url("perfil") ?>">Perfil</a>
      <a href="<?= url("sobre") ?>">Sobre</a>
    </nav>
<main>
    
    <?= $this->section("content"); ?>
</main>

</body>
</html>