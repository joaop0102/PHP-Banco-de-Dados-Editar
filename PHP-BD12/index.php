<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="card">
            <div class="logo_consultar"> <img class="img-fluid" src="consult1.png" alt=""> </div>
            <div class="text-center">
            <h3 class="textinho">Cadastre-se</h3>
            <hr style="width: 50%; margin: auto;">
            </div>
            <form action="cadastrar2.php" method="POST">
                <div class="campo ajusteform">
                    <input name="nome" type="text" required="">
                    <label >Nome:</label>
                </div>
                <div class="campo ajusteform">
                    <input name="endereco" type="text" required="">
                    <label>Endereço:</label>
                </div>
                <div class="campo ajusteform">
                    <input name="bairro" type="text" required="">
                    <label>Bairro:</label>
                </div>
                <div class="campo ajusteform">
                    <input name="cep" type="text" required="">
                    <label>Cep:</label>
                </div>
                <div class="campo ajusteform">
                    <input name="cidade" type="text" required="">
                    <label>Cidade:</label>
                </div>
                <div class="campo ajusteform">
                    <input name="estado" type="text" required="">
                    <label>Estado:</label>
                </div>
                <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                </div>
            </form>
                
            </div>
        </div>
    </div>
</body>
</html>