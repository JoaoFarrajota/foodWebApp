<?php

class server
{

	private $con;
	public function _construct()
	{
		$this->con = (is_null($this->con)) ? self::connect() : $this->con;
	}

	static function connect()
	{
		include "openconn.php";

		$this->con = $conn;

		$db = mysql_select_db('forDatabase', $con);



	}

	public function getPratoName($id_array)
	{
		$id = $id_array['id'];
		$sqlN = "Select nome FROM prato WHERE pratoID = '$id'";
		$queryN = mysql_query($sqlN, $this->$con);
		$resN = mysql_fetch_array($queryN );
		return $resN['nome'];
	}

	public function getNomeVendedor($id_array)
	{
		$id = $id_array['id'];
		$sqlNV1 = "Select VendedorID FROM prato WHERE pratoID = '$id'";
		$queryNV1 = mysql_query($sqlNV1, $this->$con);
		$resNV1 = mysql_fetch_array($queryNV1 );

		$sqlNV2 = "Select utilizadorID FROM vendedor WHERE id= '$resNV1'";
		$queryNV2 = mysql_query($sqlNV1, $this->$con);
		$resNV2 = mysql_fetch_array($queryNV2 );


		$sqlNV3 = "Select nome FROM utilizador WHERE id= '$resNV2'";
		$queryNV3 = mysql_query($sqlNV1, $this->$con);
		$resNV3 = mysql_fetch_array($queryNV3 );

		return $resNV3['nome'];
	}

	public function getPreco($id_array)
	{
		$id = $id_array['id'];
		$sqlP = "Select preco FROM prato WHERE pratoID = '$id'";
		$queryP = mysql_query($sqlP, $this->$con);
		$resP = mysql_fetch_array($queryP );
		return $resP['nome'];
	}

	public function getListaDeIngredientes($id_array)
	{
		$id = $id_array['id'];
		$sqlLI = "Select nome FROM ingredientes WHERE pratoID = '$id'";
		$queryLI = mysql_query($sqlLI, $this->$con);
		$resLI = mysql_fetch_array($queryLI );
		return $resLI;
	}
}

params = array('rui' => 'SomewhereOverTheRainbow/soap/server.php');
$server = new SoapServer(NULL, $params);
$serversetClass('server');
$server->handle();

?>
