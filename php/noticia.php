 <?php
 	include("conectaBD.php");
    $id=0;
    $titulo=$_POST['titulo'];
    $descricao=$_POST['desc'];
    $descricao = preg_replace("/(\\r)?\\n/i", "<br/>", $descricao);
    $autor=$_POST['autor'];
    $img = $_FILES["img"];
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img["name"], $ext);
 		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 		$caminho_imagem = "imgs/" . $nome_imagem;
	move_uploaded_file($img["tmp_name"], $caminho_imagem);
    $sql = $mysqli->prepare("insert into noticia values (?,?,?,?,?,now())");
    $sql->bind_param("issss",$id,$titulo,$descricao,$autor,$nome_imagem);
    $sql->execute();
    $sql->store_result();
    $result=$sql->affected_rows;
    if($result > 0){
        echo "<script>alert('Notícia enviada com sucesso');location.href='../cadastrar.html';</script>";
    }else{
        echo "<script>alert('Notícia não enviada com sucesso');location.href='../cadastrar.html';</script>";
    }
 ?>