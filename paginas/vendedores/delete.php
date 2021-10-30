<?php

require_once("../../conexao.php");

$data = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];

    //excluindo o registro
    $sql = "DELETE FROM vendedor WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);

    if ($stmt->execute()) {
        $data['retorno'] = ["alert-success", "Registro excluído."];
        //$data['redirect'] = ["index.php?pag=vendedores/vendedor.php", 2000];
    }else{
        $data['retorno'] = ["alert-warning","Não foi possível excluir o registro."];
    }    
}else{
    $data['retorno'] = ["alert-warning","Não foi identificar o ID do registro."];
}  

echo json_encode($data);
