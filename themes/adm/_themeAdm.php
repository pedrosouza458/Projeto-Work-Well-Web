<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= CONF_SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?= url("assets/adm/css/styles.css"); ?>">
    <script type="text/javascript" src="<?= url("assets/app/scripts/scripts.js"); ?>" async></script>
</head>
<body>
<nav>  
<a href="<?= url("sobre") ?>"><?php
          if(!empty($_SESSION['user']["photo"])):
        ?>
            <img src="<?= url($_SESSION['user']["photo"]); ?>" class="img-avatar" id="Avatar" alt="...">
        <?php
          endif;
        ?>
     </a>
<nav class="navMenu">
    
      <a href ="<?= url("app") ?>">Home</a>
      <a href="<?= url("app/work") ?>">Work</a>
      <a href="<?= url("app/perfil") ?>">Perfil</a>
      <a href="<?= url("sobre") ?>">Sobre</a>

     
    </nav>
    
<main>
    
    <?= $this->section("content"); ?>
</main>

</body>
</html>