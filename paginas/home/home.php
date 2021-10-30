<?php

//moedas consultadas
const DOLAR_REAL = 'USD-BRL';
const EURO_REAL  = 'EUR-BRL';

$endpoint1 = "https://economia.awesomeapi.com.br/json/last/" . DOLAR_REAL;
$endpoint2 = "https://economia.awesomeapi.com.br/json/last/" . EURO_REAL;


$dollar = array();
$euro = array();

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL            => $endpoint1,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'GET'
]);

//resposta
$response_dollar = curl_exec($curl);

curl_setopt_array($curl, [
    CURLOPT_URL            => $endpoint2,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'GET'
]);

$response_euro = curl_exec($curl);

//fecha a conexão
curl_close($curl);

$dollar = json_decode($response_dollar, true);
$dollar = $dollar['USDBRL'] ?? [];

$euro = json_decode($response_euro, true);
$euro = $euro['EURBRL'] ?? [];

?>

<div class="row mt-5">

    <div class="col-12">
        <h3 class="main-title">Cotações</h3>
    </div>

    <div class="col-md-6">
        <div class="card">
            <!-- <img src="img/dollar.png" class="card-img-top" alt=""> -->
            <div class="card-body">
                <h5 class="card-title"><?php echo $dollar['name'] ?></h5>
                <p class="card-text text-danger">Compra: <?php echo $dollar['bid'] ?></p>
                <p class="card-text text-success">Venda: <?php echo $dollar['ask'] ?></p>
                <p class="card-text text-info">Variação: <?php echo $dollar['varBid'] ?></p>
                <p class="card-text text-primary">Porcentagem de variação: <?php echo $dollar['pctChange'] ?></p>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <!-- <img src="img/euro.jpg" class="card-img-top" alt=""> -->
            <div class="card-body">
            <h5 class="card-title"><?php echo $euro['name'] ?></h5>
                <p class="card-text text-danger">Compra: <?php echo $euro['bid'] ?></p>
                <p class="card-text text-success">Venda: <?php echo $euro['ask'] ?></p>
                <p class="card-text text-info">Variação: <?php echo $euro['varBid'] ?></p>
                <p class="card-text text-primary">Porcentagem de variação: <?php echo $euro['pctChange'] ?></p>
            </div>
        </div>
    </div>

</div>

<a href="index.php" type="button" class="btn btn-primary mt-3">Atualizar</a>