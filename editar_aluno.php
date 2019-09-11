<?php
/**
 * Arquivo para registrar os dados de um aluno no banco de dados.
 */
if (isset($_REQUEST['atualizar']))
{
  try 
{
    include ' includes/conexao.php';

    $sql =  "UPDATE alunos (nome,data_nascimento,sexo
                                 genero,cpf,cidade,estado,bairro,
                                 rua,cep)
                                 VALUES (?,?,?,?,?,?,?,?,?,?)";
                                 
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(1,$_REQUEST['nome']);     
  $stmt->bindParam(2,$_REQUEST['data_nascimento']);  
  $stmt->bindParam(3,$_REQUEST['sexo']);  
  $stmt->bindParam(4,$_REQUEST['genero']);  
  $stmt->bindParam(5,$_REQUEST['cpf']);  
  $stmt->bindParam(6,$_REQUEST['cidade']);  
  $stmt->bindParam(7,$_REQUEST['estado']);  
  $stmt->bindParam(8,$_REQUEST['bairro']);  
  $stmt->bindParam(9,$_REQUEST['rua']);      
  $stmt->bindParam(10,$_REQUEST['cep']);  
  $stmt->execute();
  
  
 } catch(Exception $e) {
     echo $e->getMessage();
 }
}
?>
<link href ="css/estilo.css" type="text/css" rel="stylesheet"/>
<?php include_once 'includes/cabecalho.php' ?>
<div>
<fieldset>
<legend>Cadastro Alunos</legend>
<form action="editar_alunos.php?atualizar=true">
<label>Nome:<input type= "text" name ="nome" required /> </label>
<label>Cidade:<input type= "text" name ="cidade" required /> </label>
<label>Cep :<input type= "text" name ="cep" required /> </label>
<label>Bairro:<input type= "text" name ="bairro" required /> </label>
<label>Rua:<input type= "text" name ="rua" required /> </label>
<label>Estado:<input type= "text" name ="estado" required /> </label>
<label>Data Nasc:<input type= "text" name ="data_nascimento" required /> </label>
<button type="submit">Salvar</button>
</form>
</legend>
</div>
