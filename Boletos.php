<?php
/**
*	Classe para API Kinghost.net.
*	Created on 09/09/2010
*	@author Mauricio de Souza (mauriciosouza100@hotmail.com)
*	@version 1.0
*	@access public
*	@package API Kinghost.net
*	@example Classe Boletos();
*/
header('Content-Type: text/html; charset=utf8');

require_once 'Kinghost.php';
class Boletos extends Kinghost
{
	// getBoletos() {{{
	/**
	* Retorna os boletos do cliente passado como parâmetro, dominio e status solicitado (pago ou aberto)
	* 
	* Example:
	* <code>
	* require_once 'Boleto.php';
	* $boleto = new Boletos('meu@email.com' , '123456');
	* print_r($boleto->getBoletos('123456','78901','aberto'));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getBoletos($idCliente = false, $idDominio = false, $status = false)
	{
	   if($idDominio == false){
		$this->doCall( 'boleto/'.$idCliente.'/'.$status , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
			}else{
			$this->doCall( 'boleto/'.$idCliente.'/'.$idDominio.'/'.$status , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
			}
	}
	// }}}
	
	
	// getBancos() {{{
	/**
	* Retorna lista dos bancos para configuração de boletos.
	* 
	* Example:
	* <code>
	* require_once 'Boleto.php';
	* $boletos = new Boletos('meu@email.com' , '123456');
	* print_r($boletos->getBancos());
	* </code>
	**
	* @access public
	* @return object
	*/		
	public function getBancos()
	{
		$this->doCall( 'boleto/bancos', '' , 'GET');
		return @json_decode($this->getResponseBody() , true);	
	}
	// }}}
	
	// addBoleto() {{{
	/**
	* Cria um novo Boleto.
	* 
	* Example:
	* <code>
	* require_once 'Boleto.php';
	* $boletos = new Boletos('meu@email.com' , '123456');
	* print_r($boletos->addBoleto($param));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function addBoleto($param)
	{
		$this->doCall( 'boleto/', $param , 'POST');
		return @json_decode($this->getResponseBody() , true);	
	}
	// }}}
	
	
}

	?>