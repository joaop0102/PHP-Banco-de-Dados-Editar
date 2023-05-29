<?php 
    define('MYSQL_HOST', 'localhost:3306');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB_NAME', 'clientes');

    try{
        $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

    }catch(PDOException $e){
        echo 'Erro ao conectar com o MySQL ' . $e->getMessage();
    }

    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $sql = "INSERT INTO clientes (nome, endereco, bairro, cep, cidade, estado) VALUES ('$nome', '$endereco','$bairro', '$cep','$cidade', '$estado')";

    if ($PDO->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } 
    

    header("Location: cadastro3.html");
exit();
?>
