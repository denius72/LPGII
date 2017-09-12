<!DOCTYPE html>
<html lang = "pt-BR">
<head>
        <title>Teste PHP</title>
        <meta charset = "utf-8" />
</head>
<body>
<?php
echo "<p>hello bitches</p>";
?>
<form action="formulario.php" method="post">
Email: <input type="text" name="email" value="<?php echo $email;?>"><br /><br />
Senha: <input type="text" name="senha" value="<?php echo $senha;?>"><br /><br />
<input type="submit">
</body>
</html>