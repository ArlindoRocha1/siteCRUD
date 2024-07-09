<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Cadastrar Usuario</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="processa.php" method="post">
        <label>Nome:</label>
        <input type="text"name="nome" placeholder="Digite o nome completo"> <br><br>
        <label>email:</label>
        <input type="email" name="email" placeholder="Digite o seu e-mail"> <br><br>
        <input type="submit" value="Cadastra">
    </form>
</body>
</html>
