<?php
session_start();
require_once "../dal/class.data.membre.php";

function isConnected(){
    return !empty($_SESSION['login']) ? true : false;
}

/*function isAdmin(){
    return !empty($_SESSION['admin']) && $_SESSION['admin'] == true ? true : false;
}*/

/*if($_POST['content'] == 'admin'){
    if(isAdmin()){
        echo 'true';
    }else{
        echo 'false';
    }
}else*/if($_POST['content'] == 'connected'){
    if(isConnected()){
        echo 'true';
    }else{
        echo 'false';
    }
}elseif(empty($_POST['content']) && !isConnected()){
    echo "signin";
}elseif(empty($_POST['content']) && isConnected()){ 
    echo "account";
}elseif($_POST['content'] == "signin" && !isConnected()){
    echo "signin";
}elseif($_POST['content'] == "instructeurs" && isConnected()){
    echo "instructeurs";
}elseif($_POST['content'] == "account" && isConnected()){
    echo "account";
}else{
    echo "signin"; 
}