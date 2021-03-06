<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/MARC PROJECT/';
    include($path . "model/connectp.php");
    
	class DAOCart{

		function check_prod($id){
			$email = $_SESSION['email'];

            $sql = "SELECT * FROM cart WHERE email = '$email' AND idproduct = '$id'";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			$res = $qu->fetchObject();
			
			connect::close($conexion);

			return $res;
		}


		function add_prod($id){
            $email = $_SESSION['email'];

            $sql = "INSERT INTO cart VALUES ('$email','$id','1')";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			
			connect::close($conexion);
		}



		function show_prod(){
            $email = $_SESSION['email'];

            $sql = "SELECT c.email, c.idproduct, p.product, p.flavour, p.brand, p.kg, p.datecaducity, p.img, p.price, c.quantity, (c.quantity * p.price) total FROM cart c, products p WHERE c.idproduct = p.idproduct AND email = '$email'";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			$res = $qu->fetchAll();
			
			connect::close($conexion);

			return $res;
		}



		function show_localprod($id){
            $sql = "SELECT p.idproduct, p.product, p.flavour, p.brand, p.kg, p.datecaducity, p.img, p.price FROM products p WHERE p.idproduct = '$id'";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			$res = $qu->fetchObject();
			
			connect::close($conexion);

			return $res;
		}




		function delete($id){
			$email = $_SESSION['email'];

			$sql = "DELETE FROM cart WHERE email = '$email' AND idproduct = '$id'";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			
			connect::close($conexion);
		}



		function changequ($num, $id){
			$email = $_SESSION['email'];

			$sql = "UPDATE cart SET quantity = $num WHERE email = '$email' AND idproduct = '$id'";
            
            $conexion = connect::con();

			$qu = $conexion->prepare($sql);
			$qu->execute();
			
			connect::close($conexion);
		}



		function checkout(){
			$email = $_SESSION['email'];

			$sql1 = "INSERT INTO checkout SELECT * FROM cart c, (SELECT NOW() day) day WHERE c.email='$email'";
			$sql2 = "DELETE FROM cart WHERE email = '$email'";

			$conexion = connect::con();

			$qu1 = $conexion->prepare($sql1);
			$qu1->execute();

			$qu2 = $conexion->prepare($sql2);
			$qu2->execute();
			
			connect::close($conexion);
		}

	}