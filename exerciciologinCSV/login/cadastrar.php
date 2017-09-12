<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 'aes-128-cbc', '!2#4%6', true, '0123456789123456');

    $dados = array($email, $encrypted_password);                         

    if (($handle = fopen("users.csv", "r")) !== false) 
    {
        $jaecziste= false;
        while (($data = fgetcsv($handle, 0, ",")) !== false) 
        {
            if (strcmp($email,$data[0]) == 0)
            {
                echo '<script language="javascript">';
                echo 'alert("Erro: este endereço de email já está cadastrado.")';
                echo '</script>';
                $jaecziste = true;
                include 'cadastro.php';
                break;
            }
        }
        fclose($handle);
        if ($jaecziste == false)
        {
            $file = fopen('users.csv', 'a');
            fputcsv($file, $dados);
            fclose($file);
            echo '<script language="javascript">';
            echo 'alert("Usuário cadastrado com sucesso!")';
            echo '</script>';
            include 'index.php';
        }
    }
    $jaecziste = false;

?>