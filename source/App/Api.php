<?php

namespace Source\App;

use Source\Models\Notification;
use Source\Models\User;
use Source\Models\Task;


class Api
{

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();
        if(empty($headers["Email"]) || empty($headers["Password"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe E-mail e senha"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->task = new Task();
        $this->user = new User();
        if(!$this->user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "E-mail ou Senha inválidos"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
    }

  
    public function getUser()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }
  // api/user/name/Fábio/email/fabio@gmail.com/password/12345678
  public function createUser(array $data)
  {

      if($this->user->findByEmail($data["email"])){
          $response = [
              "code" => 400,
              "type" => "bad_request",
              "message" => "E-mail já cadastrado"
          ];
          echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
          return;
      }

      $this->user->setName($data["name"]);
      $this->user->setEmail($data["email"]);
      $this->user->setPassword($data["password"]);
      $this->user->insert();
      $response = [
          "code" => 200,
          "type" => "success",
          "message" => "Usuário cadastrado com sucesso"
      ];
      echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }

  public function createTasks(array $data){

    $this->task->setText($data["text"]);
    $this->task->setIdImportance($data["idImportance"]);
    $this->task->insert();
    $response = [
        "code" => 200,
        "type" => "success",
        "message" => "tarefa cadastrada"
    ];
    echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }

    public function getTasks()
    {
        if($this->user->getId() != null){
            $tasks = new Task();

            if(!$tasks->findByidUser($this->user->getId())){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Erro"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Funcionou!",
                "task" => $tasks->findByidUser($this->user->getId())
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateUser(array $data) : void
    {
        if($this->user->getId() != null){
            $this->user->setName($data["name"]);
            $this->user->setEmail($data["email"]);
            $this->user->setDocument($data["document"]);
            $this->user->update();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário alterado com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateTask(array $data) : void
    {
        if($this->task->findTaskId() != null){
            $this->task->setText($data["text"]);
            $this->task->setIdImportance($data["idImportance"]);
            $this->task->update();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Tarefa alterada com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }



    public function getTask(array $data)
    {
        //var_dump($data);
        if(!empty($data["idTask"])){
            $task = new Task($data["idTask"]);
            if(!$task->findTaskId()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "não funcionou."
                ];
                echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "funcionou!",
                "task" => [
                    "id" => $task->getId(),
                    "text" => $task->getText(),
                    "idImportance" => $task->getidImportance()
                ]
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }
}

