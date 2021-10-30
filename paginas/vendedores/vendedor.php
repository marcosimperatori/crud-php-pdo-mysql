<?php
require_once 'conexao.php';

//define total de exibição
$itens_por_papina = 5;

//marca a página atual
@$pagina = $_GET['pagina']; 

if (isset($pagina))
    $pc = $pagina;
else
    $pc = 1;

//determinar valor inicial das buscas limitadas;
$inicio = $pc -1;
$inicio = ($inicio * $itens_por_papina);


$sql = "SELECT * FROM vendedor";
$limite = $pdo->prepare("$sql ORDER BY nome LIMIT $inicio, $itens_por_papina ");
$limite->execute();
$vendedores = $limite->fetchAll(PDO::FETCH_ASSOC);

$todos  = $pdo->prepare($sql);
$todos->execute();
$total = $todos->fetchAll();


//total de registros
$tr = count($total);

//total de páginas
$tp = ceil($tr / $itens_por_papina);

?>

<h2 class="mt-5 align-center">Listagem de vendedores(as)</h2>

<div id="mensagem" class="justify-content-center mt-2">
    <div class="alert " role="alert">
        <div class="result"></div>
    </div>
</div>

<div class="mt-3">
    <a class="btn btn-primary " href="index.php?pag=vendedores/add.php" role="button">Adicionar</a>
</div>


    <?php if ($tr > 0) { ?>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  for ($i = 0; $i < count($vendedores); $i++) {
                    foreach ($vendedores[$i] as $key => $value) {
                    }
                    
                    ?>
                    <tr>
                        <td><?php echo $vendedores[$i]['nome'] ?></td>
                        <td><?php echo $vendedores[$i]['email'] ?></td>
                        <td>
                            <a class="btn btn-outline-success  btn-sm" href="index.php?pag=vendedores/edit.php&id=<?php echo $vendedores[$i]['id'] ?>" role="button">Editar</a>
                            <a class="btn btn-outline-danger   btn-sm excluir" destino="paginas/vendedores/delete.php" registro="<?php echo $vendedores[$i]['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination"> 

                <?php 
                    $anterior = $pc -1; 
                    $proximo  = $pc +1;

                    if($anterior > 0) {
                ?>  

                <li class="page-item"><a class="page-link" href="index.php?pag=vendedores/vendedor.php&pagina=<?php echo $anterior?>">Anterior</a></li>  

                <?php } 
                   else { ?>
                    <li class="page-item"><a class="page-link" href="#>">Anterior</a></li>
                 
                 <?php

                    } if($proximo <= $tp) {
                ?>

                <li class="page-item"><a class="page-link" href="index.php?pag=vendedores/vendedor.php&pagina=<?php echo $proximo?>">Próximo</a></li>
                <?php } 
                
                else{?> <li class="page-item"><a class="page-link" href="#">Próximo</a></li> <?php }?> 
            </ul>
        </nav>

    <?php } else { ?>

        <div class="alert alert-info mt-6" role="alert">
            Nenhum registro foi encontrado!
        </div>
    <?php } ?>