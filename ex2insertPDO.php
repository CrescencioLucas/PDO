<?php
$nome = $_POST['nome'];
$idade = $_POST['idade'];

$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_prt_042_bd';

try{
    $conx = new PDO ("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $query = "INSERT INTO teste1 (nome, idade) VALUES ('$nome', '$idade')";
    $conx->exec($query);
    
    print "Seu cadastro foi efetuado com sucesso";
    $conx=null;

}catch(PDOExecption $e){
    print "Conexão falhou: " . $e->getMessage(); 
}