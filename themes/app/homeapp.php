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
<div class="conteudo">
    <img src="assets/app/images/welcome.png" class="img1">
<br>


<h1>Bem Vindo(a) <?php echo "{$_SESSION["user"]["name"]}" ?></h1>
   
    <p>&nbsp Crie avisos e alarmes com o Work Well e melhore sua rotina<br>
      aqui e agora, tudo de forma gratuita e de fácil acesso, confira <br>
      nossas funcionalidades.<p>
        <br>    
      
        <button type="button" id="btn"><a href ="<?= url("app/work") ?>">Acesse Work</a></button>
        
      </div><br>
        </div>
        <img src="assets/app/images/mobile.png" class="img2"> 
        <div class="conteudo2">

          <br>
          <h1>Nosso App</h1>
         
         
      
              <p>Você pode conferir também o nosso app mobile de mesmo nome<br>
                aqui e agora, tudo de forma gratuita e de fácil acesso, confira <br>
                aqui o link do app.<p>
                  <br>    
                  
                
                 
                </div><br>
                  </div>

                  <script>
                    
                    </script>
</body>
</html>