<?php

require_once("../../conexao.php");

//faz limpeza nos dados enviados minimizando a chance de um sqlinjection
$dform = filter_input_array(INPUT_POST, FILTER_SANITIZE_ADD_SLASHES);


//variável de retorno
$data = array();

if (!empty($dform['nome']) ) {

    //verifica se o usuário já existe
    $sql = "select id from make where descricao=? order by id desc limit 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $dform['nome']); 
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $data['retorno'] = ["alert-danger", "Esta descrição já está sendo utilizado. "];
        echo json_encode($data);
        exit();
    }

    //recuperando os dados que vieram via POST, após já terem sidos sanitizados
    $dados = [
        ":nome"  => $dform['nome'],
    ];

    $sql = "INSERT INTO make(descricao) VALUES(:nome)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute($dados)) {
        $data['retorno'] = ["alert-success", "Cadastro efetuado com sucesso."];
        $data['redirect'] = ["index.php?pag=make/make.php", 2000];
    }
} else {
    $data['retorno'] = ["alert-danger", "Favor preencher todos os campos"];
}

//retorna para o ajax algo que for colocado dentro de $data
echo json_encode($data);
