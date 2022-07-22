<?php 


include_once("../crud/index.php");

$row = (object) findone($_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atualização de Motoristas</title>
</head>

<body>
    <form action="../crud/index.php?update=true" method="POST">
        Nome:<br />
        <input type="text" name="nome" placeholder="Qual seu nome?" value="<?php echo $row->nome; ?>" /><br /><br />
        CPF:<br />
        <input type="text" name="CPF" placeholder="Insira seu CPF" value="<?php echo $row->CPF; ?>"><br /><br />
        CNH:<br />
        <input type="text" name="CNH" placeholder="Insira sua CNH" value="<?php echo $row->CNH; ?>"><br /><br />
        <br /><br />
        <input type="hidden" value="<?php echo $row -> ID; ?>" name="ID">
        <button type="submit">Atualizar</button>
    </form>
</body>

</html>

