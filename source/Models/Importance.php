<?php

namespace Source\Models;

use Source\Core\Connect;

class Importance
{
    private $id;
    private $import;


    /**
     * @param $id
     * @param $import
     */
    public function __construct($id = null, $import = null)
    {
        $this->id = $id;
        $this->import = $import;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM importance";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    
}