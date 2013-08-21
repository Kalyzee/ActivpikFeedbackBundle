<?php

namespace Activpik\FeedbackBundle\Vendor\Tools;


/**
 * 
 * @author Ludovic Bouguerra <ludovic.bouguerra@kalyzee.com>
 *
 */
class RestClient
{
	protected $url;
	protected $headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
	);

	public function __construct($url = null){
		$this->url = $url;
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function doPost($paramsGet, $paramsPost){
		$ressource =  $this->_init();
		$this->_initUrl($ressource, $paramsGet);
		curl_setopt($ressource, CURLOPT_POST, true);
		curl_setopt($ressource, CURLOPT_POSTFIELDS, $paramsPost);

		return $this->_execute($ressource);
	}

	public function doGet($params){
		$ressource = $this->_init();
		$this->_initUrl($ressource, $params);
		return $this->_execute($ressource);
	}

	public function doPut($params){


		$ressource = $this->_init();
		$this->_initUrl($ressource);
		curl_setopt($ressource, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ressource, CURLOPT_POSTFIELDS, $data);
		return $this->_execute($ressource);
		 
	}

	public function doDelete($params){
		$ressource = $this->_init();
		$this->_initUrl($ressource, $params);
		curl_setopt($ressource, CURLOPT_CUSTOMREQUEST, 'DELETE');
		return $this->_execute($ressource);

	}

	protected function _createGetUrl($params){
		return $this->url."?".http_build_query($params, '', "&");
	}


	protected function _initUrl($ressource, $params = null){
		 
		$url = $this->url;
		if ($params != null){
			$url = $this->_createGetUrl($params);
		}

		curl_setopt($ressource, CURLOPT_URL, $url);
	}

	protected function _init(){
		$ressource = curl_init();
		//-- A CHANGER --
		curl_setopt($ressource, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ressource, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ressource, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ressource, CURLOPT_SSL_VERIFYPEER, false);

		return $ressource;
	}

	protected function _execute($ressource){
		$response = curl_exec($ressource);
		$code = curl_getinfo($ressource, CURLINFO_HTTP_CODE);


		$objResponse = new \stdClass();
		$objResponse->response = $response;
		$objResponse->code = $code;

		return $objResponse;

	}



}