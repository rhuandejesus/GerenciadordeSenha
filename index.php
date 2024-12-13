<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD gerenciador de senhas</title>
    <link rel="stylesheet" href="style.css">
    
    <?php
    //echo"<pre>";
    print_r($_POST);
    //echo"<pre>";

    //conexão com o banco de dados
    $conexao = mysqli_connect('localhost','root','','senhas');

    if($conexao)
    {
        print("Banco de dados Conectado");
    }

    //CREATE
    if($_POST)
    {
        $servico = $_POST ['servico'];
        $login = $_POST ['login'];
        $senha = $_POST ['senha'];

        mysqli_query($conexao,"INSERT INTO tb_info (SERVICO, LOGIN, SENHA) VALUES ('$servico', '$login', '$senha')");
        unset($_POST);
        header('location: index.php');
    }

    //DELETE
    if ($_GET && $_GET['acao'] == 'excluir') {
        mysqli_query($conexao, 'DELETE FROM tb_info WHERE ID = ' . $_GET['ID']);
    }
    
    
    //READ
    $resultado = mysqli_query($conexao,'SELECT * FROM tb_info');   
    ?>
 

</head>

<body class="body">

    <h1 id="titulo">Gerenciador de Senhas</h1>
    <br>
    <hr><br>

    <div>
        <br>
        <form method="post" action="index.php">
            <label class="label">Serviço/Site<input type="text" name="servico"required></label>
            <label>Login/Email<input type="text" name="login"></label>
            <label>Senha<input type="text" name="senha"></label>
            <button type="submit">Cadastrar</button>
            <br>
            <br><br><hr><br>

        </form>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr class="tr">
                <th class="th">ID</th>
                <th>Serviço/Site</th>
                <th>Login/e-mail</th>
                <th>Senha</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
    
    while ($dados = mysqli_fetch_assoc($resultado)) {  
        echo "<tr>";
        echo "<td>".$dados['ID']."</td>";
        echo "<td>".$dados['SERVICO']."</td>";
        echo "<td>".$dados['LOGIN']."</td>";
        echo "<td>".$dados['SENHA']."</td>";
        echo "<td>
                <button class='btn-edit'><a href='atualizar.php?acao=atualizar& 
                ID=".$dados['ID']."
                &servico=".$dados['SERVICO']."
                &login=".$dados['LOGIN']."
                &senha=".$dados['SENHA']."
                '>Atualizar</a></button>
                <button class='btn-delete'><a href='index.php?acao=excluir&ID=".$dados['ID']."'>Excluir</a></button>

                
              </td>";
        echo "</tr>";
    }
?>
        </tbody>
    </table>


</body>

</html>