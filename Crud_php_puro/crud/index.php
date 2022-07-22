<?php
// PDO
//Conexão
try {
    $conecction = new PDO('mysql:host=localhost;port=3306;dbname=motorista','root','');
} catch(Exception $error) {
    echo "Ocorreu o seguinte erro: {$error ->getMessage()}";
}

// Insert

function insert(){

	global $conecction;
	$sql = 'insert into motorista (nome, CPF, CNH) values (:nome, :cpf, :cnh)';
	$result = $conecction -> prepare($sql);
	$result -> bindValue(':nome', $_POST['nome']);
	$result -> bindValue(':cpf', $_POST['CPF']);
	$result -> bindValue(':cnh', $_POST['CNH']);
	$result -> execute();

}


// Read

function list_all(){

	global $conecction;
	$sql = 'select * from motorista';
	$result = $conecction -> prepare($sql);
	$result -> execute();
	return $result->fetchAll(PDO::FETCH_OBJ);

}

function findone($id){

	global $conecction;
	    $stmt = $conecction->prepare("SELECT * FROM motorista WHERE id=? LIMIT 1");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if(!$row){
            return ['ID'=> '','nome'=> '', 'CPF'=> '', 'CNH'=>''];
        }
        return $row;
}

// Update


function update(){
		
	global $conecction;
	$sql = "UPDATE motorista SET nome=?, CPF=?, CNH=? WHERE ID=?";
	$result = $conecction->prepare($sql);	
	$a = [$_POST['nome'],$_POST['CPF'],$_POST['CNH'],$_POST['ID']];	
	$result->execute($a);
		
}

// Delete

function delete ($id){

	global $conecction;
	$sql = "delete from motorista where id = :id";
	$result = $conecction -> prepare($sql);	
	$result -> execute(['id'=>$id]);
	echo "teste";
}

if (isset($_GET["create"])){
	insert();
	header('Location: http://localhost/motoristas/list.html ');
}


if (isset($_GET["delete"])){
	delete($_GET["delete"]);
	header('Location: http://localhost/motoristas/list.html ');
}

if (isset($_GET["update"])){
	update();
	header('Location: http://localhost/motoristas/list.html ');
}

?>
