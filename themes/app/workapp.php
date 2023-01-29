<?php
$this->layout("_themeApp");

// var_dump( $tasks);

?>
    <html>
      <head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../assets/app/pushjs/push.min.js"></script>
    <script src="../assets/app/pushjs/serviceWorker.min.js"></script>
    <link href = "<?= url("assets/app/"); ?>css/work.css" rel = "stylesheet"
      href="https://fonts.googleapis.com/css2?family=Arvo&family=Dosis:wght@600;700&family=Open+Sans:wght@400;500&family=Raleway&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Arvo&family=Bebas+Neue&family=Dosis:wght@600;700&family=Lato:ital,wght@0,400;1,300&family=Montserrat:wght@500&family=Open+Sans:wght@400;500&family=Poppins&family=Raleway:wght@300;400&family=Roboto+Condensed&family=Ubuntu:wght@300&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Work</title>
  </head>
  <body>
    <!-- menu -->


    <br /><br /><br /><br />
    <div class="conteudo">
      <br />
      <h1>Seus trabalhos</h1>
      <br /><br>
      <!-- 
<img src="../assets/images/work.png" class="img1"> -->
      <div class="wrapperMenus">
        <div class="todolist">
      
          <br />
          <h1 class="titulo">Lista de Tarefas</h1>
         
          <br />
          <form id = "form-tasks" novalidate>
                <input name = "text" type = "text" placeholder = "tarefa">
                <select name="idImportance" id = "importance">
             <option name = "1" value="1">Pouca</option>
             <option name = "2" value="2">Média</option>
             <option name = "3"value="3">Muita</option>
           </select>
          

          <button type ="submit" id="todo-add-btn" value="enviar">Adicione</button>  
          </form>
          <?php
foreach ($tasks as $task){
  ?><br>
  <a class = "line"><?= $task->text ; ?></a>
  <?php
  }
  ?> 
          <div class="col-12" id="message">
                                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                            </div>
  
          <br /><br />
          <ul id="todos-list">
          <div id = "txtTodo">
           
            </div>
            <!-- <input class="checkbox" type="checkbox" > -->
            <!-- 
            <!-- <span class="remove">&cross;</span> -->
          </ul>
        </div>
        <!-- <div class="notification">
          <br />
          <h1 class="titulo">Notificação</h1>
          <br />

          <input
            autocomplete="off"
            type="text"
            placeholder="&nbsp digite seu lembrete"
            id="notify-input"
          />
          <input
            autocomplete="off"
            type="time"
            placeholder="&nbsp digite o tempo"
            id="time-input"
            
          />
          
          <br /><br>
          
          Importância
          <select id = "importance">
             <option value="pouca">Pouca</option>
             <option value="media">Média</option>
             <option value="muita">Muita</option>
           </select><br /></br>

          <button onclick= "teste()">Notifique</button>
          <audio src="../assets/app/pushjs/bell-sound.wav" id="audio"></audio>
          <br> <br>
          <div id = "txt">
            
          </div>
        </div> -->
      </div>
    </div>
    <br />

    <!-- <script src="../assets/app/scripts/todolist.js"></script>

    <script src="../assets/app/scripts/notification.js"></script> -->
   
   <script type="text/javascript" async>
                            const form = document.querySelector("#form-tasks");
                            const message = document.querySelector("#message");
                            form.addEventListener("submit", async (e) => {
                                e.preventDefault();
                                const dataTask = new FormData(form);
                                const data = await fetch("<?= url("app/work"); ?>",{
                                    method: "POST",
                                    body: dataTask,
                                });
                                const task = await data.json();
                                console.log(task);
                                if(task) {
                            
                                    message.innerHTML = task.message;
                                    message.classList.add("message");
                                    message.classList.remove("success", "warning", "error");
                                    message.classList.add(`${task.type}`);
                                }
                               
                            });
                        </script>
            
  
  </body>
</html>
