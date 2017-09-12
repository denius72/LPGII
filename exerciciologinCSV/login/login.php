<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 'aes-128-cbc', '!2#4%6', true, '0123456789123456');

    $dados = array($email, $encrypted_password);                         

    if (($handle = fopen("users.csv", "r")) !== false) 
    {
        $nonecziste = false;
        while (($data = fgetcsv($handle, 0, ",")) !== false)
        {
            if (strcmp($email,$data[0]) == 0)
            {
                if(strcmp($encrypted_password,$data[1]) == 0)
                {
                    echo "Logado com sucesso!";
                    echo "<br /><br /><h5>Teria mais coisas aqui se eu precisasse fazer.</h5>";
                    $nonecziste = true;
                    break;
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Erro: dados inválidos")';
                    echo '</script>';
                    $nonecziste = true;
                    include 'index.php';
                }
            }
        }
        fclose($handle);
        if ($nonecziste == false)
        {
            echo '<script language="javascript">';
            echo 'alert("Erro: dados inválidos")';
            echo '</script>';
            include 'index.php';
        }
    }
    $nonecziste = false;

?>