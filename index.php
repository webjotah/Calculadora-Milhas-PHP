<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="center">
        <form action="index.php" method="POST">
            <div class="inputs">
                <label for="VG"> Valor gasto(R$): </label>
                <input type="number" name="VG">
            </div>
            <div class="inputs">
                <label for="pontuacao"> Pontuação da promoção por real gasto: </label>
                <input type="number" name="pontuacao">
            </div>
            <div class="inputs">
                <label for="bonificacao"> Bonificação da transferência(%): </label>
                <input type="number" name="bonificacao">
            </div>
            <div class="inputs">
                <label for="VM"> Valor do milheiro para a venda(R$): </label>
                <input type="number" name="VM">
            </div>
            <button type="submit"> ENVIAR</button>
        </form>
        <?php
            $aux = false;
            if(count($_POST) > 0){
                $VG = $_POST["VG"];
                $PT = $_POST["pontuacao"];
                $bonificacao = $_POST["bonificacao"];
                $VM = $_POST["VM"];

                if($bonificacao >= 20 && $bonificacao <= 130){
                    if($VM >= 17 && $VM <= 29 ){
                        $aux = true;
                        
                        $ptAcumulados = $VG * $PT;
                        $milhas = $ptAcumulados + ($ptAcumulados * ($bonificacao / 100));
                        $retorno = ($milhas / 1000) * $VM;
                        $vF = $VG - $retorno;
                    } else {
                        echo 'Valor Invalido!';
                    }
                } else {
                    echo 'Valor Invalido!';
                }
    ?>
        <div class="output">
            <span>Retorno(R$): <?php if($aux == true){echo $retorno;} else {$retorno = null;}; ?></span>
        </div>
        <hr>
        <div class="output VG">
            <span>Valor real gasto(R$): <?php if($aux == true){echo $vF;} else {$vF = null;}; ?> </span>
        </div>

        <?php };?>
    </div>
</body>

</html>