<?php
@include("conexao.php");
$nome = $_POST['nome'];
$snome = $_POST['sobre_nome'];
$tel = $_POST['telefone'];
$nascimento = $_POST['nascimento'];


if(!isset($_POST['linguagem']))
{
    echo "Marque uma linguagem";
}
else{
    $linguagem = $_POST['linguagem'];
if(empty($nome)|| empty($snome) || empty($tel)|| empty($nascimento))
{
    echo ("Um ou mais campos em branco");
    die;
}
else
{
if(isset($linguagem['html']))
{
    $html = "1";
}
else{ $html = "0";}

if(isset($linguagem['css']))
{
    $css = "1";
}
else{$css = "0";}

if(isset($linguagem['js']))
{
    $js = "1";
}
else{$js ="0";}

$consulta = $pdo->prepare("SELECT * FROM devCadastro WHERE tel=:t");
$consulta->bindValue(":t",$tel);
$consulta->execute();
$res = $consulta->fetch();


if(!isset($res['tel']))
    {

$sql = $pdo->prepare("INSERT INTO devCadastro(nome,snome,tel,nascimento,html,css,js)
VALUES(:n,:sn,:t,:na,:ht,:cs,:js)");

$sql->bindValue(":n",$nome);
$sql->bindValue(":sn",$snome);
$sql->bindValue(":t",$tel);
$sql->bindValue(":na",$nascimento);
$sql->bindValue(":ht",$html);
$sql->bindValue(":cs",$css);
$sql->bindValue(":js",$js);
$sql->execute();

echo("Parabéns, você foi cadastrado!");

}else{ echo"Já Está cadastrado";}

}



}
