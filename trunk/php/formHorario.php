<?php
if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * 
            FROM semana";
            $result = mysql_query($sql, $database);
}

?>

<h1>Formulário de Criação de Horário Semanal</h1>

<form action="processHorario.php?id_usuario=<?php echo $_SESSION['id_usuario']?>" method="post">
    
    <label>Dia da Semana</label>
    <select name="DiaDaSemana" id="DiaDaSemana">
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <option  value="<?php echo $row['id_DiadaSemana'] ?>"><?php echo $row['nome'] ?></option>
        <?php endwhile; ?>
            
            </br>
            
            <label for="hora_inicio">
            <input type="time" id="hora_inicio">
</form>