<div class="d-flex justify-content-center mt-5">
    <h3>Cadastro de vendedor(a)</h3>
</div>

<div>
    <form method="POST" id="paginas/vendedores/inserir.php">
        <div class="d-flex justify-content-center mt-5">
            <div class="mb-6 col-6">
                <label for="exampleFormControlTextarea1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe um nome">
            </div>
        </div>


        <div class="d-flex justify-content-center mt-4">
            <div class="mb-6 col-6">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Informe um email">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button class="fa btn btn-primary ">Gravar </button>
        </div>

        <div class="justify-content-center mt-5">
            <div class="alert " role="alert">
                <div class="result"></div>
            </div>
        </div>

    </form>
</div>