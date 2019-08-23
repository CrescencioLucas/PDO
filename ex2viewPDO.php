<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Exibe as pessoas cadastradas</title>
    </head>

    <body>
        <h1>Pessoas cadastradas:</h1>

        <?php
            $host = 'localhost';
            $user = 'aluno';
            $passw = 'aluno';
            $dbname = 'atv_prt_042_bd';
            
            try{
            $conx = new PDO("mysql:host=$host;dbname=$dbname" , $user, $passw);
            
            $query = "SELECT testID, nome, idade FROM teste1 ORDER BY testID ASC"; // Ordena a tab
            
            $consulta = $conx->query($query);
            while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

                $table[] = $row;
                }
        ?>
                
            <table>
            <tr>
                <td><strong>ID</strong></td>
                <td width="10">&nbsp;</td>
                <td><strong>Nome</strong></td>
                <td width="10">&nbsp;</td>
                <td><strong>Idade</strong></td>
                <td width="10">&nbsp;</td>
            </tr>

            <?php
                if ($table) {
                foreach($table as $d_row) {
            ?>
                    <tr>
                        <td><?php echo($d_row["testID"]); ?></td>
                        <td width="10">&nbsp;</td>
                        <td><?php echo($d_row["nome"]); ?></td>
                        <td width="10">&nbsp;</td>
                        <td><?php echo($d_row["idade"]); ?></td>
                        <td width="10">&nbsp;</td>
                    </tr>
            <?php
                }
                }
            ?>
            </table>
            <?php
            $number_regs = $consulta->rowCount();
            ?>
            <p>Número de Registros : <?php print $number_regs; ?></p>

        <?php
        $conx = null;
        }catch (PDOExecption $e){
            print "Conexão Falhou" . $e->getMessage();
        }
        ?>   
    </body>
</html>