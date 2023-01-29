<?php

namespace Source\Models;

use Source\Core\Connect;

class Task
{
    private $id;
    private $text;
    private $idImportance;
    private $message;
    private $checked;

    /**
     * @param $id
     * @param $category
     * @param $description
     * @param $checked
     */

     public function teste(){
        echo 'teste';
     }
    public function getMessage()
    {
        return $this->message;
    }

    public function __construct($id = null, $text = null, $idImportance = null, $checked = null)
    {
        $this->id = $id;
        $this->text = $text;
        $this->idImportance = $idImportance;
        $this->checked = $checked;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM tasks";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE tasks SET text = :text, idImportance = :idImportance WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":text",$this->text);
        $stmt->bindParam(":idImportance",$this->idImportance);
        $stmt->bindParam(":id",$this->id);
      
        $stmt->execute();
        $arrayUser = [
            "id" => $this->id,
            "text" => $this->text,
            "idImportance" => $this->idImportance,
        ];
        $_SESSION["user"] = $arrayUser;
        $this->message = "Tarefa alterada com sucesso!";
        } catch (\Throwable $th) {
            $this->message = $th;
        }
       
    }

    public function findByImportance($idImportance)
    {
        $query = "SELECT * FROM tasks WHERE idImportance = :idImportance";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idImportance",$idImportance);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

  /**
     * @param string $text
     * @return bool
     */
    public function findByText(string $text) : bool
    {
        $query = "SELECT * FROM tasks WHERE text = :text";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":text", $text);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    
    public function showAllTasks( $idImportance)
    {
        $query = "SELECT * FROM `tasks` WHERE 1";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idImportance",$idImportance);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function insertTasks() : bool
    {
        $query = "INSERT INTO tasks (text, idImportance) VALUES (:text, :idImportance)";
        var_dump($query);
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":idImportance", $this->idImportance);
        $stmt->execute();
        $this->message = "Tarefa cadastrada com sucesso!";
        return true;
    }

    public function findTaskId() : bool
    {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $task = $stmt->fetch();
            $this->text = $task->text;
            return true;
        }
    }

    
    public function findByidUser(int $idUsers)
    {
        $query = "SELECT * 
                  FROM tasks 
                  JOIN user_task ON tasks.id = user_task.idTasks 
                  WHERE idUsers = :idUsers";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idUsers", $idUsers);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }

    }


    public function insert() : bool
    {
        $query = "INSERT INTO tasks (text, idImportance) VALUES (:text, :idImportance)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":idImportance", $this->idImportance);
        $stmt->execute();
        $this->message = "Tarefa cadastrada com sucesso!";
        return true;
    }

   /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

     /**
     * @param string|null $idImportance
     */
    public function setIdImportance(?string $idImportance): void
    {
        $this->idImportance = $idImportance;
    }


    public function getidImportance(): ?string
    {
        return $this->idImportance;
    }
    
    

    public function getJSON() : string
    {
        return json_encode(
            ["task" => [
                "text" => $this->getText(),
            ]],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

      /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function validate (string $text, string $idImportance) : bool
    {
        $query = "SELECT * FROM tasks WHERE text LIKE :text";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":text", $text);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $this->message = "Tarefa não cadastrada!";
            return false;
        } else {
            $task = $stmt->fetch();
        }

        $this->id = $task->id;
        $this->text = $task->text;
        $this->idImportance = $task->idImportance;
        
        return true;
    }

}
