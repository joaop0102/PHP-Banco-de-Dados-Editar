<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de dados</title>
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
                            <h3>Consulte seus dados</h3>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-secondary table-striped-columns">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Cep</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $host = 'localhost:3306';
                                $user = 'root';
                                $senha = '';
                                $banco = 'clientes';

                                $conexao = mysqli_connect($host, $user, $senha, $banco);

                                if (mysqli_connect_errno()) {
                                    die('Falha ao conectar ao banco de dados: ' . mysqli_connect_error());
                                }

                                if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['bairro']) && isset($_POST['cep']) && isset($_POST['cidade']) && isset($_POST['estado'])) {
                                    $id = $_POST['id'];
                                    $nome = $_POST['nome'];
                                    $endereco = $_POST['endereco'];
                                    $bairro = $_POST['bairro'];
                                    $cep = $_POST['cep'];
                                    $cidade = $_POST['cidade'];
                                    $estado = $_POST['estado'];

                                    $query = "UPDATE clientes SET nome='$nome', endereco='$endereco', bairro='$bairro', cep='$cep', cidade='$cidade', estado='$estado' WHERE id=$id";

                                    if (mysqli_query($conexao, $query)) {
                                        echo 'Item atualizado com sucesso!';
                                    } else {
                                        echo 'Erro ao atualizar o item: ' . mysqli_error($conexao);
                                    }
                                }

                                $query = "SELECT * FROM clientes";
                                $result = mysqli_query($conexao, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "<td>" . $row['endereco'] . "</td>";
                                        echo "<td>" . $row['bairro'] . "</td>";
                                        echo "<td>" . $row['cep'] . "</td>";
                                        echo "<td>" . $row['cidade'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        echo "<td><a href='editar.php?id=" . $row['id'] . "' class='btn btn-outline-warning btn-sm me-1'>Editar</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>Nenhum registro encontrado</td></tr>";
                                }

                                mysqli_close($conexao);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
