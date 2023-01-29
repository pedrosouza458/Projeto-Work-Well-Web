<?php
$this->layout("_themeApp");
?>

<html>
  <head>
    <link href = "<?= url("assets/web/"); ?>css/register.css" rel = "stylesheet">
    <meta charset = "UTF-8";>
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Dosis:wght@600;700&family=Open+Sans:wght@400;500&family=Raleway&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Bebas+Neue&family=Dosis:wght@600;700&family=Lato:ital,wght@0,400;1,300&family=Montserrat:wght@500&family=Open+Sans:wght@400;500&family=Poppins&family=Raleway:wght@300;400&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet">   

    <title>Register</title>

  </head>
<body>
<br>
<h1 style="text-align: center;">Lista de Tarefas</h1>
<div class="todolist">
<?php
foreach ($tasks as $category){
?><br>
<a class = "line"><?= $category->text ; ?></a>
<?php
}
?>
</div>
</body>
</html>