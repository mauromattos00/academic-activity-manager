<h2>Adicionar Disciplina</h2>

<form action="php/processDisciplina.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="post">
<label for="nome_disciplina">Nome da Nova Disciplina</label>
<input type="text" name="nome_disciplina" id="nome_disciplina">

<label for="nome_professor">Nome do(a) Professor(a)</label>
<input type="text" name="nome_professor" id="nome_professor">

<input type="submit" name="submit" id="submitt" value="Concluir">
