<?php
require_once('app/Models/Votador.php');
require_once('app/Controllers/ControllerVotador.php');

if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade']) && !empty($_POST['RN'])) {

    $Votador = new Votador($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['RN']);

    $Votador->validarDados();

    if (empty($Votador->erro)) {
        $votadorDao->createVotador($Votador);
    }
}

?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTAÇÃO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary p-5">

    <div class="container border border-2 rounded-4 p-5 pt-4 pb-4 bg-white mb-5 shadow" style="max-width: 400px;">
        <form method="POST">
            <h1 class="mb-3 text-center fw-bold">VOTAÇÃO</h1>

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>

            <?php if (isset($Votador) && !empty($Votador->erro["erro_nome"])) { ?>
                <div class="alert alert-danger d-flex align-items-center" style="max-height: 10px; font-size: 13;" role="alert">
                    <svg class="bi flex-shrink-0 me-2 " role="img" aria-label="Danger:" style="max-width: 15px;">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <?php if (!empty($Votador->erro["erro_nome"])) { ?>
                        <div>
                            <?php echo $Votador->erro["erro_nome"]; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (isset($Votador) && !empty($Votador->erro["erro_cpf"])) { ?>
                <div class="alert alert-danger d-flex align-items-center" style="max-height: 10px; font-size: 13;" role="alert">
                    <svg class="bi flex-shrink-0 me-2 " role="img" aria-label="Danger:" style="max-width: 15px;">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?php echo $Votador->erro["erro_cpf"]; ?>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($Votador) && !empty($Votador->erro["erro_idade"])) { ?>
                <div class="alert alert-danger d-flex align-items-center" style="max-height: 10px; font-size: 13;" role="alert">
                    <svg class="bi flex-shrink-0 me-2 " role="img" aria-label="Danger:" style="max-width: 15px;">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?php echo $Votador->erro["erro_idade"]; ?>
                    </div>
                </div>
            <?php } ?>

            <!-- ==================== Nome do eleitor ==================== -->
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold mb-0">Nome do eleitor</label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light" value="" required>
                </div>
                <!-- ========================================================= -->

                <!-- ========================== CPF ========================== -->
                <div class="mb-3">
                    <label for="cpf" class="form-label fw-bold mb-0">CPF</label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-light" value="" required>
                </div>
                <!-- ========================================================= -->

                <!-- ========================= Idade ========================= -->
                <div class="mb-3">
                    <label for="idade" class="form-label fw-bold mb-0">Idade</label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-light" value="" required>
                </div>
                <!-- ========================================================= -->

                <!-- ========================================================= -->
                <div class="mb-3 col-sm-4">
                    <img style="max-width: 70px;" class=" rounded " src="fotos/Bill_Gates.png" alt="Bill">
                </div>

                <div class="mb-3 form-check col-sm-8 pt-4">
                    <input class="form-check-input" type="radio" name="RN" value="1" required>
                    <label class="form-check-label fw-bold" for="R_1">Bill Gates</label>
                </div>

                <div class="mb-3 col-sm-4 ">
                    <img style="max-width: 70px;" class=" rounded " src="fotos/Mark_Zuckerberg.png" alt="Mark">
                </div>

                <div class="mb-5 form-check col-sm-8 pt-4">
                    <input class="form-check-input" type="radio" name="RN" value="2" required>
                    <label class="form-check-label fw-bold" for="R_2">Mark Zuckerberg</label>
                </div>
                <!-- ========================================================= -->
            </div>
            <!-- ========================================================= -->
            <div class="d-grid">
                <input type="submit" value="VOTAR" class="btn btn-primary btn-lg">
            </div>
            <!-- ========================================================= -->

        </form>



    </div>
    <?php if (isset($Votador) && !empty($Votador->msg)) { ?>
        <div class="container border border-2 rounded-4 p-3 pt-4 mb-3 bg-white  shadow" style="max-width: 400px;">

            <p> <?php echo $Votador->msg ?>
            <p>

        </div>
    <?php } ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>