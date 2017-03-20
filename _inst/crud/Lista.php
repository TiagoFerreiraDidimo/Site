<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome=1">
        <link  rel="stylesheet" href="css/bootstrap.css">
        <script  src="js/bootstrap.js"></script>
        <script src="jquery-3.1.0.min.js"></script>
        <!-- Create Tiago Ferreira-->
        <title>Easy Donation</title>
    </head>
    <body>
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav-divider">
                    <li class="btn-danger"><a href="cadastro.php">Cadastro</a></li>
                    <li class="btn-danger"><a href="Atualizar.php">Atualizar</a></li>
                    <li class="btn-danger"><a href="Lista.php">Listar</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <h4 class="h4"><b>Lista</b></h4>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-8">
                <?php
                include './ConexaoDB.php';
                $buscarUsuario = $pdo->query("SELECT * FROM usuario");
                foreach ($buscarUsuario as $row) {
                    print $row["nome"] . "-" . $row["cpf"] . "<br/>";
                }?>
                <form action="CRUDusuario.php" method="POST">
                    <h5 class="h5"><b>Cpf:</b></h5><br/>
                    <input class="text-danger" type="text" name="cpf"><br/><h6 class="h6"> Através do CPF delete usuário.</h6>
                    <br/>
                    <input class="btn-primary" type="submit" name="del" value="Del">
                </form>
            </div>
        </div>
    </body>
</html>
