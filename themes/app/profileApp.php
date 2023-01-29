<?php
$this->layout("_themeApp");


?>
<html>
  <head>
    <meta charset = "UTF-8";>
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Dosis:wght@600;700&family=Open+Sans:wght@400;500&family=Raleway&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Bebas+Neue&family=Dosis:wght@600;700&family=Lato:ital,wght@0,400;1,300&family=Montserrat:wght@500&family=Open+Sans:wght@400;500&family=Poppins&family=Raleway:wght@300;400&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap" rel="stylesheet">   

    <title>Register</title>

  </head>

<div class="container">

<form enctype="multipart/form-data" method="post" id="formProfile">
<div class="mb-3">
        <?php
          if(!empty($_SESSION['user']["photo"])):
        ?>
            <img src="<?= url($_SESSION['user']["photo"]); ?>" class="img-thumbnail" id="photoShow" alt="...">
        <?php
          endif;
        ?>
    </div>
    <div class="mb-3">
        
        <label for="name" class="form-label">Nome: </label>
        <input type="text" name="name" class="form-control" id="name" value="<?=$_SESSION['user']["name"];?>" placeholder="Seu Nome...">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" name="email" class="form-control" id="email" value="<?=$_SESSION['user']["email"];?>"  placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Sua Foto: </label>
        <input class="form-control" type="file" name="photo" id="photo">
    </div>
    
    <div class="mb-3">
    <button type="submit" class="btn btn-primary" name="send">Alterar</button>
    </div>
    <div class="alert alert-primary" role="alert" id="message">
        Mensagem de Retorno!
    </div>

</form>
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const message = document.querySelector("#message");
    const photos = document.querySelector("#photoShow");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("app/perfil"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user.photo);
        if(user) {
          console.log("funcionou sdfsd ")
            if(user.type === "alert-success") {
                console.log(user);
                photos.setAttribute("src",user.photo);
            }
            message.textContent = user.message;
            message.classList.remove("alert-primary", "alert-danger");
            message.classList.add(`${user.type}`);
        }
    });
</script>

</body>

</html>