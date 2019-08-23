<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Exibe os feedbacks</title>
</head>
<body>
<h1>Feedback do Usuário</h1>
<?php
//Parâmetros de conexão com BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_prt_041_bd';

try {
    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    //Cria a Query SQL
    $query = "SELECT membros.email, membros.nome, membros.escola, membros.funcao, escolas.estado, equipes.nome_equipe, equipes.num_equipe FROM membros, escolas, equipes WHERE equipes.num_equipe=membros.num_equipe AND escolas.nome_escola=membros.escola ORDER BY membros.nome ASC";
    
    //Executa a Query
    $consulta = $conx->query($query);

    while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $table[] = $row;
    }
?>

        <table>
        <tr>
            <td><strong>Membros</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Email</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Escola</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Estado</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Função</strong></td>
            <td width="10">&nbsp;</td>
            <td><strong>Nome da Equipe</strong></td>
            <td width="10">&nbsp;</td>
        </tr>

<?php

        //Verifica se há linhas para exibir
        if ($table) {
        //Recupera cada elemento da array
        foreach($table as $d_row) {
?>
        <tr>
            <td><?php echo($d_row["nome"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["email"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["escola"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["estado"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["funcao"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["nome_equipe"]); ?></td>
            <td width="10">&nbsp;</td>
        </tr>

<?php
}
}
?>

    </table>
<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}
?>
</body>
</html>
