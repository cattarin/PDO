<?php
  
    include_once('./config.php');

    if (isset($_POST['submit'])) {
        
        $id = $_POST['id'];
     
        $sql = ' DELETE FROM usuarios WHERE id = :id ';
    
        try {
          
            $query = $bd->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_INT);  //msm coisa q o value (diferença) - value(joga na hora) - param(joga somente no execute)
            $query->execute();
            echo  "<script>alert('Usuario deletado com sucesso!');</script>";
            
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
        <h1>Delete</h1> 
        
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="id">ID:</label>
                <input type="text" name="id">
                <input type="submit" value="Deletar" name="submit">
            </div>
            <br><a href="index.php">Voltar</a>
        </form>
    </body>
</html>