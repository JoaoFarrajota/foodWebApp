<?php

class client
{
	public function __construct()
	{
		$params = array('location' => 'http://SomewhereOverTheRainbow/soap/server.php', 'uri' => 'urn://SomewhereOverTheRainbow/soap/server.php', 'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}

	public function getName($id_array)
	{
		return $this->instance->__soapCall('getPratoName', $id_array);
	}

	public function getNomeVendedor($id_array)
	{
		return $this->instance->__soapCall('getNomeVendedor', $id_array);
	}

	public function getPreco($id_array)
	{
		return $this->instance->__soapCall('getPreco', $id_array);
	}

	public function getListaDeIngredientes($id_array)
	{
		return $this->instance->__soapCall('getListaDeIngredientes', $id_array);
	}
}

$client = new client;
?>