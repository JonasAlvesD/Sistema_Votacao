<?php
require_once('app/Models/Votador.php');
require_once('app/Controllers/ControllerVotador.php');

$v1 = 0;
$v2 = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELATORIO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary p-5">

    <?php if ($votadorDao->readVotador()) { ?>

        <?php foreach ($votadorDao->readVotador() as $votadores) {

            if ($votadores["RN"] == 1) {
                $v1 = $v1 + 1;
            } else {
                $v2 = $v2 + 1;
            }
        } ?>

    <?php } ?>

    <div class="container border border-2 rounded-4 bg-white p-4 mb-4">
        <h1 class="text-center fw-bold text-uppercase">Relatório</h1>
    </div>

    <div class="container overflow-hidden text-center p-0 ">

        <div class="row gx-6">
            <div class="col">
                <div class="p-3 mb-4 border bg-light border border-2 rounded-4">
                    <img class="rounded-4" style="max-width: 350px;" src="fotos/Bill_Gates.png" alt="Bill_Gates">
                    <p class="fw-bold fs-5">Bill Gates</p>
                </div>
                <div class="p-1 mb-4 border bg-light border border-2 rounded-4">

                    <p class="fs-5">Quantidade de votos:<br><?php echo $v1; ?></p>
                </div>
            </div>
            <div class="col">
                <div class="p-3 mb-4 border bg-light border border-2 rounded-4">
                    <img class="rounded-4" style="max-width: 350px;" src="fotos/Mark_Zuckerberg.png" alt="Mark_Zuckerberg">
                    <p class="fw-bold fs-5">Mark Zuckerberg</p>
                </div>
                <div class="p-1 mb-4 border bg-light border border-2 rounded-4">
                    <p class="fs-5">Quantidade de votos:<br><?php echo $v2; ?></p>
                </div>
            </div>
        </div>

    </div>

    <div class="container border border-2 rounded-4 p-5 pt-4 pb-4 bg-white mb-5">
        <div class="container">

            <h2 class="mb-3 text-center fw-bold">Tabela de registros</h2>

            <table class="table table-striped">
                <thead class="table-dark">

                    <tr>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Idade</th>
                        <th>Voto</th>
                        <th>Data Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($votadorDao->readVotador()) { ?>
                        <?php foreach ($votadorDao->readVotador() as $votadores) { ?>
                            <tr>
                                <td><?php echo $votadores["nome"]; ?></td>
                                <td><?php echo $votadores["cpf"]; ?></td>
                                <td><?php echo $votadores["idade"]; ?></td>
                                <td><?php echo $votadores["RN"]; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($votadores["data_registro"])); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>