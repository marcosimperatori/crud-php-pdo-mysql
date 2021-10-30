<?php

require_once("conexao.php");

$id = $_GET['id'];

$sql = "select * from vendedor where id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="d-flex justify-content-center mt-5">
    <h3>Editar cadastro de vendedor(a)</h3>
</div>

<div>
    <form method="POST" id="paginas/vendedores/update.php">

        <input type="hidden" class="form-control" id="id" name="id" value="<?php  echo $user['id']  ?>">

        <div class="d-flex justify-content-center mt-5">
            <div class="mb-6 col-6">
                <label for="exampleFormControlTextarea1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe um nome" required value="<?php echo $user['nome'] ?>">
            </div>
        </div>


        <div class="d-flex justify-content-center mt-4">
            <div class="mb-6 col-6">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Informe um email" required value="<?php echo $user['email'] ?>">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <div class="modal-footer mt-3">
                <a type="submit" class="btn btn-info" href="index.php?pag=vendedores/vendedor.php">Cancelar </a>
                <button class="fa btn btn-primary ">Gravar </button>
            </div>
        </div>

        <div class="justify-content-center mt-5">
            <div class="alert " role="alert">
                <div class="result"></div>
            </div>
        </div>

    </form>
</div>