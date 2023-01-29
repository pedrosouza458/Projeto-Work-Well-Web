<?php
use Source\Core\Connect;

$query = "SELECT * FROM users";
$stmt = Connect::getInstance()->prepare($query);
$stmt->execute();

$data = "<!DOCTYPE html>";
$data .= "<html lang='pt-br'>";
$data .= "<head>";
$data .= "<meta charset='UTF-8'>";
$data .= "<title>Relatório de Usuários</title>";
$data .= "</head>";
$data .= "<body>";
$data .= "<h1><center>Relatório de Usuários</center></h1>";

while($users = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($users);
    $data .= "<br><b>Nome:</b> $name <br><br>";
    $data .= "<b>Email:</b> $email <br><br>";
    $data .= "<hr>";
}

$data .= "</body>";

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$dompdf->loadHtml($data); 

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Work-Well - Relatório de Usuários");
?>