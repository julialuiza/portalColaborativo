 <?php
 	$servidor="localhost";
    $usuario="root";
    $senha="";
    $bancodedados="portalcolaborativo";

    $mysqli=new mysqli($servidor,$usuario,$senha,$bancodedados);

    if(mysqli_connect_errno()){
        die("Houve um erro:".mysqli_connect_errno());
        exit();
    }
?>