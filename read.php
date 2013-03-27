<?php

    include_once('./config.php');

    if (isset($_POST['submit'])) {
        
        $nome = $_POST['nome'];
        $parametro = Array(':nome'=>'%'.$nome.'%');
        
        $sql = ' SELECT * FROM usuarios WHERE nome LIKE :nome ';
    
        try {
          
            $query = $bd->prepare($sql);
            $query->execute($parametro);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);     //mysqlp_fecth_assoc
        } catch (Exception $e) {
           echo $e->getMessage();
        }
      
        // fetch_assoc
        foreach ($resultado as $r) {
            echo '<ul>';
            echo '<li><strong>ID:</strong> ' .$r['id'];
            echo '<li><strong>Nome:</strong> ' .$r['nome'];
            echo '<li><strong>E-mail:</strong> ' .$r['email'];
            echo '<li><strong>Criado em:</strong> ' .$r['criado_em'];
            echo '</ul>';
        }
  
          // fetch_num
//        foreach ($resultado as $r) {
//            echo '<ul>';
//            echo '<li><strong>ID:</strong> ' .$r[0];
//            echo '<li><strong>ID:</strong> ' .$r[1];
//            echo '<li><strong>ID:</strong> ' .$r[2];
//            echo '<li><strong>ID:</strong> ' .$r[3];
//            echo '</ul>';
//        }
        
          // fetch_both
//        foreach ($resultado as $r) {
//            echo '<ul>';
//            echo '<li><strong>ID:</strong> ' . $r['id'];              // ou $r[0];
//            echo '<li><strong>ID:</strong> ' . $r['nome'];            // ou $r[1];
//            echo '<li><strong>ID:</strong> ' . $r['email'];           // ou $r[2];
//            echo '<li><strong>ID:</strong> ' . $r['criado_em'];       // ou $r[3];
//            echo '</ul>';
//         }
        
          // fetch_obj
//        foreach ($resultado as $r) {
//            echo '<ul>';
//            echo '<li><strong>ID:</strong> ' .$r->id;
//            echo '<li><strong>ID:</strong> ' .$r->nome;
//            echo '<li><strong>ID:</strong> ' .$r->email;
//            echo '<li><strong>ID:</strong> ' .$r->criado_em;
//            echo '</ul>';
//         }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
    </head>
    <body>
        <h1>Read</h1> 
        
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
                <input type="submit" value="Buscar" name="submit">
            </div>
            <br><a href="index.php">Voltar</a>
        </form>
    </body>
</html>