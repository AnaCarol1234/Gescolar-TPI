<?php
try
{
    include  'includes/conexao.php';
    $stmt = $conexao->prepare("SELECT * FROM aluno ORDER BY nome ASC ");
    $stmt->execute();

} catch(Exception $e) {
    echo $e->getMessage();
}
?>
<link href = "css/estilo.css" type="text/css" rel="stylesheet"/>

 <?php include_once 'includes/cabecalho.php' ?>

 <table>
   <thead>
    <tr>

       <th>ID</th>
       <th>Nome</th>
  </tr>
</thead>
<tbody>
<?php while($cursos = $stmt -> fetchObject()): ?>
<tr>
<td>
   <td><?= $cursos-> id ?></td>
   <td><?= $cursos->nome ?></td>

</tr>
<?php endwhile ?>
</tbody>
</table>