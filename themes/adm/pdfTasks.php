<?php
use Source\Core\Connect;

$query = "SELECT * FROM tasks";
$stmt = Connect::getInstance()->prepare($query);
$stmt->execute();

$data = "<!DOCTYPE html>";
$data .= "<html lang='pt-br'>";
$data .= "<head>";
$data .= "<meta charset='UTF-8'>";
$data .= "<title>Relatório de Tarefas</title>";
$data .= "</head>";
$data .= "<body>";
$data .= "<h1><center>Relatório de Tarefas</center></h1>";

while($tasks = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($tasks);
    $data .= "<br><b>Texto:</b> $text <br><br>";
    $data .= "<b>Importância:</b> $idImportance <br><br>";
    $data .= "<b>Checada:</b> $checked <br><br>";
    $data .= "<b>Criada em:</b> $created_at <br><br>";
    $data .= "<hr>";
}

$data .= "</body>";

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$dompdf->loadHtml($data); 

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Work-Well - Relatório de Tarefas");
?>