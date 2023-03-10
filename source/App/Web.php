<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_WEB,'php');
        //$this->view = new Engine(__DIR__ . "/../../themes/web",'php');
    }

    public function home() : void
    {
        // require __DIR__ . "/../../themes/web/home.php";

        $user = new User(2);
        $user->findById();
        //var_dump($user);

        echo $this->view->render(
            "home",["user" => $user]);
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",
            ["name" => "Fábio", "age" => 46]
        );

    }

    public function work() : void
    {
        echo $this->view->render(
            "work",
        );

    }

    public function profile() : void
    {
        echo $this->view->render(
            "profile",
        );

    }

    public function register(?array $data) : void
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

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();

            if($user->findByEmail($data["email"])){
                $json = [
                    "message" => "Email já cadastrado!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User(
                null,
                $data["name"],
                $data["email"],
                $data["password"]
            );

            if(!$user->insert()){
                $json = [
                    "message" => $user->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "name" => $data["name"],
                    "message" => $user->getMessage(),
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            }

            // Usuário salvo com sucesso
            return;
        }

        echo $this->view->render("register",["eventName" => CONF_SITE_NAME]);
    }

    public function login(?array $data) : void
    {
        if(!empty($data)) {
            if(in_array("", $data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];

                echo json_encode($json);
                return;
            }

            $user = new User();

            if(!$user->validate($data["email"],$data["password"])){
                $json = [
                    "message" => "E-mail e/ou senha não estão cadastrados!",
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            }

            //header("Location:app");

            // Autorizado, usuário segue para o APP
    
            $json = [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "message" => $user->getMessage(),
                "photo" => url($user->getPhoto()),
                "type" => "alert-success"
            ];
            echo json_encode($json);
            return;
          
           
        }


        echo $this->view->render("login",["eventName" => CONF_SITE_NAME]);

    }


    public function contact(array $data) : void
    {
        var_dump($data);
        echo $this->view->render("contact");
    }

    public function error(array $data) : void
    {
//      echo "<h1>Erro {$data["errcode"]}</h1>";
//      include __DIR__ . "/../../themes/web/404.php";
        echo $this->view->render("404", [
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

}
