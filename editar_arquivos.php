<?php
try
{
    include 'includes/conexao.php';

    //Lista de alunos
    $stmt_alunos = $conexao->prepare("SELECT * FROM aluno ORDER BY nome ASC ");
    $stmt_alunos->execute();

    //Lista de turmas
    $stmt_alunos = $conexao->prepare("SELECT * FROM turma ");
    $stmt_alunos->execute();
    
    //Dados da matricula antes de editar
    $stmt_matricula = $conexao->prepare("SELECT * FROM matricula WHERE id_turma = ? AND id_aluno = ? ");
    $stmt_matricula->binParam(1,$_REQUEST['id_turma']);
    $stmt_matricula->binParam(2,$_REQUEST['id_aluno']);
    $stmt_alunos->execute();

    $dados_matricula = $stmt_matricula->fetchObject();

    //para atualizar a matricula
    if(isset($_REQUEST['atualizar']))
    {
        $sql = "UPDATE matricula SET id_turma = ?, id_aluno = ?, data_matricula = ?
                WHERE id_turma = ? AND id_aluno = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->binParam(1,$_REQUEST['id_turma']);
    $stmt->binParam(2,$_REQUEST['id_aluno']);
    $stmt->binParam(3,$_REQUEST['id_matricula']);
    $stmt->binParam(4,$_REQUEST['id_turma']);
    $stmt->binParam(5,$_REQUEST['id_aluno']);
    $stmt->execute();

    echo "Matricula atualizada com sucesso!";
     
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet"/>

<?php include_once 'includes/cabecalho.php' ?>

<div>
<fieldset>
    <legend>Editar Matricula</legend>
        <form action="editar_matricula.php?atualizar=true" method="post">
            <label>Selecione a Turma:
                <select name = "id_turma">
                    <?PHP while($turma = $stmt_turmas->fetchObject()): ?>
                    <option value="<?= $turma->id ?>"
                            <?= ($dados_matricula->id_turma == $turma->id) ? "selected" : "" ?>>
                        <?= $turma->descricao ?>
                    </option>
                    <?php endwhile ?>
                </select>
            </label>
            <label>Selecione o aluno:
                <select name="id_aluno">
                    <?php while($aluno = $stmt_aluno->fetchObject()): ?>
                    <option value= "<?= $aluno->id ?>"
                        <?= ($dados_matricula->id_aluno == $aluno->id) ? "selected" : "" ?>>>
                    <?= $aluno->nome ?>
                    </option>
                    <?php endwhile ?>
                </select>
            </label>
            <button type="submit">Salvar Matricula</button>
        </form>
    </legend>
</fieldset>
</div>



