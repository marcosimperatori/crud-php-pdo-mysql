<?php

require_once("../../conexao.php");

//faz limpeza nos dados enviados minimizando a chance de um sqlinjection
$dform = filter_input_array(INPUT_POST, FILTER_SANITIZE_ADD_SLASHES);


//variável de retorno
$data = array();


if (!empty($dform['nome']) && !empty($dform['email'])) {

    //verifica se o usuário já existe
    $sql = "select id from vendedor where nome=? order by id desc limit 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $dform['nome']);
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $data['retorno'] = ["alert-danger", "Este nome de usuário já está sendo utilizado. "];
        echo json_encode($data);
        exit();
    }

    //verifica se o usuário já existe
    $sql = "select id from vendedor where email=? order by id desc limit 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $dform['email']);
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $data['retorno'] = ["alert-danger", "Este email já está sendo utilizado."];
        echo json_encode($data);
        exit();
    }

    //recuperando os dados que vieram via POST, após já terem sidos sanitizados
    $dados = [
        ":nome"  => $dform['nome'],
        ":email" => $dform['email'],
        ":id"    => $dform['id']
    ];

    $sql = "UPDATE vendedor SET nome=:nome,email=:email WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute($dados)) {
        $data['retorno'] = ["alert-success", "Cadastro efetuado com sucesso."];
        $data['redirect'] = ["index.php?pag=vendedores/vendedor.php", 2000];
    }
} else {
    $data['retorno'] = ["alert-danger", "Favor preencher todos os campos"];
}

//retorna para o ajax algo que for colocado dentro de $data
echo json_encode($data);