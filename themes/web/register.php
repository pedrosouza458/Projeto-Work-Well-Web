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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Register</title>

  </head>

    <body>

        <div class="linha">
          <div class="coluna1"><h1>Crie sua conta</h1>
      
  <br><br><br>
       
        
        
            <form id = "form-register" novalidate>
                <input name = "name" type = "text" placeholder = "Nome">
                <input name = "email" type = "email" placeholder = "Email">
                <input name = "password" type = "password" placeholder = "Senha"><br>
                <div class="sla"> &nbsp &nbsp Já tem uma conta? <a href ="<?= url("login") ?>">Clique aqui</a></div><br>
                <input type = "submit" value = "Enviar"> <br> 
                       
               </form>
          
               <div class="col-12" id="message">
                                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                            </div>
        
        </div>
          <div class="coluna2">
  
      
      <p>Faça sua conta e orgazine a sua <br>vida conosco, é de graça <br>
               <br> <span>Sua rotina pode ser mais fácil </span></p>

                <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <h3>Shop Music<br>
              </h3> -->

              <script type="text/javascript" async>
                            const form = document.querySelector("#form-register");
                            // const message = document.querySelector("#message");
                            form.addEventListener("submit", async (e) => {
                                e.preventDefault();
                                const dataUser = new FormData(form);
                                const data = await fetch("<?= url("registro"); ?>",{
                                    method: "POST",
                                    body: dataUser,
                                });
                                const user = await data.json();
                                console.log(user);
                                if(user) {
                                    message.innerHTML = user.message;
                                    message.classList.add("message");
                                    message.classList.remove("success", "warning", "error");
                                    message.classList.add(`${user.type}`);
                          
                                }
                                window.location.href='login';
                            });
                        </script>
            
        



          </div>
        </div>

    </body>

</html>

