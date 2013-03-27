<?php   

    include_once('./config.php');

    if (isset($_POST['submit'])) {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        
        $sql = ' INSERT INTO usuarios(id,nome,email,criado_em) VALUES (NULL,:nome,:email,NOW()) ';
    
        try {
          
            $query = $bd->prepare($sql);
            $query->bindValue(':nome',$nome,PDO::PARAM_STR);
            $query->bindValue(':email',$email,PDO::PARAM_STR);
            $query->execute();
            
        } catch (Exception $e) {
            
            echo $e->getMessage();
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
    </head>
    <body>
        <h1>Create</h1> 
        
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email">
            </div>
            <div>
                <input type="submit" value="criar usuario" name="submit">
            </div>
            <br><a href="index.php">Voltar</a>
        </form>
    </body>
</html>
