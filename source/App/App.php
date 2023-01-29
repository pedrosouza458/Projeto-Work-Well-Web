<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Notification;
use Source\Models\Task;
use Source\Models\User;
use CoffeeCode\Uploader\Image;

class App
{
   
    private $view;
    private $importance;

    public function __construct()
    {
        if(empty($_SESSION["user"])|| empty($_COOKIE['user'])){
            header("Location:http://www.localhost/work-well/login");
        }
        $this->view = new Engine(CONF_VIEW_APP,'php');
        //$this->view = new Engine(__DIR__ . "/../../themes/web",'php');
    }
    //asdasd
    
    public function homeapp(): void
    {
        echo $this->view->render(
            
            "homeapp");
        // require __DIR__ . "/../../themes/app/app-home.php";
    }

    public function profileApp(): void
    {
        echo $this->view->render(
            "profileApp");
        // require __DIR__ . "/../../themes/app/app-home.php";
    }


    public function logout(){
        session_destroy();
        setcookie("user","logado",time() - 3600,"/");
        header("Location:http://www.localhost/work-well/login");
    }

    public function workapp(array $data): void
    {
       



        if(!empty($data)){

            if(in_array("", $data)) {
                $json = [
                    "message" => "Informe nome, e-mail e senha para cadastrar!",
                    "type" => "warning"
                ];

                echo json_encode($json);
                return;
            }

            $task = new Task();

            $task = new Task(
                null,
                $data["text"],
                $data["idImportance"],
            );

            if(!$task->insertTasks()){
                $json = [
                    "message" => $task->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "text" => $data["text"],
                    "message" => $task->getMessage(),
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            }

            // Tarefa salva com sucesso
            return;
        }
        $task = new Task();
        $tasks = $task->selectAll();

       

        

        echo $this->view->render(
            "workapp",[
                "tasks" => $tasks
            ]
           
        );
    
        // require __DIR__ . "/../../themes/app/workapp.php";7
        
        
    }
    
    public function notifications(?array $data) : void
    {
        if(!empty($data)){
            $notification = new Notification();
            $notifications = $notification->findByImportance($data["idImportance"]);
        }
        echo $this->view->render(
            "notifications",[
                "notifications" => $notifications
            ]
        );
    }

    public function notificationsAll() : void
    {
        $notification = new Notification();
        $notifications = $notification->selectAll();
        echo $this->view->render(
            "notifications",[
                "notifications" => $notifications
            ]
        );
    }

    public function tasks(?array $data) : void
    {
        if(!empty($data)){
            $task = new Task();
            $tasks = $task->findByImportance($data["idImportance"]);
        }
        echo $this->view->render(
            "tasks",[
                "tasks" => $tasks
            ]
        );
    }

    
    public function tasksAll() : void
    {
        $task = new Task();
        $tasks = $task->selectAll();
        echo $this->view->render(
            "tasks",[
                "tasks" => $tasks
            ]
        );
    }

    public function error(array $data) : void
    {
        echo $this->view->render("404", [
            "importance" => $this->importance,
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }


    public function list(): void
    {
        require __DIR__ . "/../../themes/app/list.php";
    }

    public function createPDF(): void
    {
        require __DIR__ . "/../../themes/app/create-pdf.php";
    }
    public function profileUpdate(array $data) : void
    {
        if(!empty($data)){
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if(in_array("",$data)){
                $json = [
                    "message" => "Informe Nome e Email...",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            if(!is_email($data["email"])){
                $json = [
                    "message" => "Informe um e-mail válido...",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            // se a imagem for alterada, manda a do formulário $_FILES
            if(!empty($_FILES['photo']['tmp_name'])) {
                $upload = uploadImage($_FILES['photo']);
                // unlink($_SESSION["user"]["photo"]);
            } else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
                $upload = $_SESSION["user"]["photo"];
            }

            try {
                $user = new User(
                    $_SESSION["user"]["id"],
                    $data["name"],
                    $data["email"],
                    null,
                    null,
                    $upload
                );
                $user->update();
                $json = [
                    "message" => $user->getMessage(),
                    "type" => "alert-success",
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                    "photo" => url($user->getPhoto())
                ];
                echo json_encode($json);
            } catch (\Throwable $th) {
                $json = [
                    "message" => $th,
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
           
        }
        
        
    }

}



?>

