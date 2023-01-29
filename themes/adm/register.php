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

        <div class="linha">
          <div class="coluna1"><h1>Cadastre sua conta ADM</h1>
      
  <br><br><br>
               
            <form id = "form-register" novalidate>
                <input name = "name" type = "text" placeholder = "Nome">
                <input name = "email" type = "email" placeholder = "Email">
                <input name = "password" type = "password" placeholder = "Senha"><br>
                <div class="sla"> &nbsp &nbsp Já tem uma conta? <a href ="<?= url("admin/login") ?>">Clique aqui</a></div><br>
                <input type = "submit" value = "Enviar">           
               </form>

               <div class="col-12" id="message">
                                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                            </div>

        
        
        </div>
          <div class="coluna2">
  
      
      <p>Faça sua conta e orgazine a sua <br>vida conosco, é de graça <br>
               <br> <span>Sua rotina pode ser mais fácil </span></p>

               <br><br><br>
         
                <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <h3>Shop Music<br>
              </h3> -->

  
              <script type="text/javascript" async>
                            const form = document.querySelector("#form-register");
                            // const message = document.querySelector("#message");
                            form.addEventListener("submit", async (e) => {
                                e.preventDefault();
                                const dataAdm = new FormData(form);
                                const data = await fetch("<?= url("admin"); ?>",{
                                    method: "POST",
                                    body: dataAdm,
                                });
                                const adm = await data.json();
                                console.log(adm);
                                if(adm) {
                                    message.innerHTML = adm.message;
                                    message.classList.add("message");
                                    message.classList.remove("success", "warning", "error");
                                    message.classList.add(`${adm.type}`);
                                    window.location.href = "<?= url("admin/login"); ?>";
                          
                                }
                          
                                window.location.href='admin/login';
                            });
                        </script>



          </div>
        </div>

    </body>

</html>
  



