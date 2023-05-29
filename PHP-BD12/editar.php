<?php
$host = 'localhost:3306';
$user = 'root';
$senha = '';
$banco = 'clientes';

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (mysqli_connect_errno()) {
    die('Falha ao conectar ao banco de dados: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM clientes WHERE id=$id";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nome = $row['nome'];
        $endereco = $row['endereco'];
        $bairro = $row['bairro'];
        $cep = $row['cep'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
    } else {
        echo 'Registro não encontrado.';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $query = "UPDATE clientes SET nome='$nome', endereco='$endereco', bairro='$bairro', cep='$cep', cidade='$cidade', estado='$estado' WHERE id=$id";

    if (mysqli_query($conexao, $query)) {
        echo 'Registro atualizado com sucesso!';
    } else {
        echo 'Erro ao atualizar o registro: ' . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col centralizar">
                <div id="tela_dados" class="card">
                    <div class="logo_consultar">
                        <img class="img-fluid" src="consult1.png" alt="">
                    </div>
                    <div class="text-center">
                        <div class="textinho">
                            <h3>Editar dados</h3>
                        </div>
                    </div>
                    <br>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $bairro; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cep; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado; ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="consulta.php" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
