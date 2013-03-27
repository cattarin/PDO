<?php
  
    include_once('./config.php');

    if (isset($_POST['submit'])) {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        
        $parametros = Array($nome,$email,$id);  //por usar "?" a ordem é importante
        
        $sql = ' UPDATE usuarios SET nome = ?,email = ? WHERE id = ? ';
    
        try {
          
            $query = $bd->prepare($sql);
       // pode usar com o bindValue (no caso tira o $parametros do execute) ou assim como está
       //     $query->bindValue(1,$nome,PDO::PARAM_STR);
       //     $query->bindValue(2,$email,PDO::PARAM_STR);
       //     $query->bindValue(3,$id,PDO::PARAM_INT);
            $query->execute($parametros);
            
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
        <h1>Update</h1> 
        
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="gustavo">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" value="gustavo@baga.com">
            </div>
            <div>
                <input type="hidden" name="id" value="1">
                <input type="submit" value="Alterar usuario" name="submit">
            </div>
            <br><a href="index.php">Voltar</a>
        </form>
    </body>
</html>