<?php

namespace Source\Models;

use Source\Core\Connect;

class Notification
{
    private $id;
    private $text;
    private $time;
    private $idImportance;

    /**
     * @param $id
     * @param $text
     * @param $time
     * @param $idImportance
     */
    public function __construct(

        int $id = null,
        string $text = null,
        string $time = null,
        int $idImportance = null)
    {
        $this->id = $id;
        $this->text = $text;
        $this->time = $time;
        $this->idImportance = $idImportance;
    }

    
    public function findByImportance( $idImportance)
    {
        $query = "SELECT * FROM notifications WHERE idImportance = :idImportance";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idImportance",$idImportance);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function selectAll()
    {
        $query = "SELECT * FROM notifications";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findById() : bool
    {
        $query = "SELECT * FROM notifications WHERE id = :id";
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
    public function getText(): ?string
    {
        return $this->text;
    }

    public function getJSON() : string
    {
        return json_encode(
            ["notifications" => [
                "text" => $this->getText(),
            ]],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}

