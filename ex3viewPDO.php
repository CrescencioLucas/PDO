<!DOCTYPE html>

<html> <head>
<meta charset="utf-8" />

<title>Exibe os carros cadastrados</title>

</head> <body>
<h1>Carros cadastrados:</h1>

<?php
//Parâmetros de conexão com BD 
$dbhost = 'localhost'; 
$dbuser = 'aluno'; 
$dbpassword = 'aluno'; 
$dbname = 'atv_prt_043_bd';
try {

    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpassword);
    
    //Cria a Query SQL
    $query = "SELECT auto_id, fabricante, ano_fabricacao, quilometragem FROM autos ORDER BY auto_id ASC";
    
    //Executa a Query
    $consulta = $conx->query($query);
    while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

        $table[] = $row;
        }
        ?>
        
        <table>
        <tr>
            <td><strong>Fabricante</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Ano fabricação</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Quilometragem</strong></td>
            <td width="10">&nbsp;</td>
        </tr>
        <?php

//Verifica se há linhas para exibir
if ($table) {
//Recupera cada elemento da array
foreach($table as $d_row) {

?>

<tr>

<td><?php echo($d_row["fabricante"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["ano_fabricacao"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["quilometragem"]); ?></td>
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
<p>Número de Registros : <?php echo $number_regs; ?></p>

<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}

?>
</body>
</html>