<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Senha</title>

    <?php
    //$id=$_GET ['ID'];
    //$servico=$_GET ['servico'];
    //$login=$_GET ['login'];
    //$senha=$_GET ['senha'];

    $conexao = mysqli_connect('localhost','root','','senhas');
    if($conexao)
    {
        print("Banco de dados Conectado");
    }
    
    //UPDATE
    if($_POST) {
        
    $id=$_GET ['ID'];
    $servico=$_GET ['servico'];
    $login=$_GET ['login'];
    $senha=$_GET ['senha'];
    
 mysqli_query($conexao,"UPDATE tb_info SET ID='$id', servico='$servico', login = '$login', senha = '$senha' WHERE ID=".$id); 
        unset($_POST);
        header('location: index.php');
    }

    ?>
</head>
<body>
    
    <h1 id="titulo">Atualizar Senha</h1>
    <br>
    <hr><br>

    <div>
        <form method="post" action="atualizar.php">
            <label>ID <input type="text" name="ID" value="<?php echo $id;?>"></label>
            <label>Serviço/Site <input type="text" name="servico" value="<?php echo $servico;?>"></label>
            <label>Login/Email <input type="text" name="login" value="<?php echo $login;?>"></label>
            <label>Senha<input type="text" name="senha" value="<?php echo $senha;?>"></label>
            <button type="submit">Atualizar</button> 
        <br>
        <br>
        <hr>           
        </form>
    </div>
    <br>
    
</body>
</html>