<?php


if(isset($_POST['submit']))
{
    include_once('config.php');

    $despesa = $_POST['despesa'];
    $valor = $_POST['valor'];
    $quant_vezes = $_POST['quant_vezes'];

    $valor_parcela = $valor / $quant_vezes;

    $data_inicial = date('Y-m-d');

    // Loop para inserir cada parcela como uma linha na tabela cadgastos
    for ($i = 0; $i < $quant_vezes; $i++) {
        // Calcula a data de vigência da parcela (1 por mês)
        $data_vigencia = date('Y-m-d', strtotime("+$i month", strtotime($data_inicial)));

      // Insere a parcela como uma nova linha
      $sql = "INSERT INTO cadgastos (despesa, valor, quant_vezes, data_vigencia) 
      VALUES ('$despesa', '$valor_parcela', '$quant_vezes', '$data_vigencia')";
        
         }
}

?>


<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Formulário | GN</title>
     <link rel="stylesheet" href="controle_de_gastos.css">

     <style>
        
     </style>
 </head>
 <body>
     <div class="box">
     <form action="controle_de_gastos.php" method="post">

             <fieldset>
                 <legend><b>Controle de despesas</b></legend>
                 <br>
                 <div class="inputBox">
                     <input type="text" name="despesa" id="despesa" class="inputUser" required>
                     <label for="despesa" class="labelInput">Despesa</label>
                 </div>
                 <br><br>
                
                 <div class="inputBox">
                     <input type="number" name="valor" id="valor" class="inputUser" required>
                     <label for="valor" class="labelInput">Valor</label>
                 </div> 
                 <br><br>
                 <div class="inputBox">
                    <input type="number" name="quant_vezes" id="quant_vezes" class="inputUser" required>
                    <label for="quant_vezes" class="labelInput">Quantidade de vezes</label>
                </div>
                <input type="submit" name="submit" id="submit">

                
             </fieldset>
         </form>
     </div>
 </body>
 </html>