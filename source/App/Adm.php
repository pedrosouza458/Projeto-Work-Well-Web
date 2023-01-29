<?php

namespace Source\App;
use Source\Models\User;
use Source\Models\Admin;
use Source\App\Connect;
use League\Plates\Engine;

class Adm
{
    public function __construct()
    {
    
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
        //$this->view = new Engine(__DIR__ . "/../../themes/web",'php');
    }
    private $view;
    public function home () : void
    {
        $user = new User();
        $users = $user->selectAll();
        echo $this->view->render(
            "homeadm",[
                "users" => $users
            ]
        );
        // require __DIR__ . "/../../themes/app/app-home.php";
}

  public function usersList () : void {

    require __DIR__ . "/../../themes/adm/usersList.php";
    $user = new User();
    $users = $user->selectName();
    foreach ($users as $value) {
        echo '<pre>';
        var_export($value);
      }

  }

  public function logout(){
    session_destroy();
    setcookie("adm","logado",time() - 3600,"/");
    header("Location:http://www.localhost/work-well/admin");
}

    public function admRegister(array $data): void 
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

            $admin = new Admin();

            if($admin->findByEmail($data["email"])){
                $json = [
                    "message" => "Email já cadastrado!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $admin = new Admin(
                null,
                $data["name"],
                $data["email"],
                $data["password"]
            );

            if(!$admin->insert()){
                $json = [
                    "message" => $admin->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "name" => $data["name"],
                    "message" => $admin->getMessage(),
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            }

            // Admin salvo com sucesso
            return;
        }
        require __DIR__ . "/../../themes/adm/register.php";
    }

     public function admLogin (array $data) {
        if(!empty($data)) {
            if(in_array("", $data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];

                echo json_encode($json);
                return;
            }

            $admin = new Admin();

            if(!$admin->validate($data["email"],$data["password"])){
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
                "id" => $admin->getId(),
                "name" => $admin->getName(),
                "email" => $admin->getEmail(),
                "message" => $admin->getMessage(),
                "type" => "alert-success"
            ];
            echo json_encode($json);
            return;
          
           
        }

        require __DIR__ . "/../../themes/adm/login.php";
     }

     public function createUserPDF () : void{
        require __DIR__ . "/../../themes/adm/pdfUsers.php";
    }

    public function createAdminsPDF () : void{
        require __DIR__ . "/../../themes/adm/pdfAdms.php";
    }

    public function createTasksPDF () : void{
        require __DIR__ . "/../../themes/adm/pdfTasks.php";
    }


    
}


