<?php
session_start();
require_once "../dal/class.data.membre.php";

if(!empty($_POST)){

    if(!empty($_POST['login']) && !empty($_POST['password'])){

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

            $membre = new Membre();

            if(!$membre->loginVerify($login)){

                if($membre->agentValide($login)){

                    $hashpass = $membre->getHashpass($login);

                    if(hash('sha512', $password) === $hashpass){

                        $_SESSION['login'] = $login;
                        echo 1;

                    }else{
                        echo 2;
                    }

                }else{
                    echo 3;
                }

            }else{
                echo 4;
            }

    }else{
        echo 6;
    }

}