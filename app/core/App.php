<?php

class App{
	protected $_Scontroller = 'homePage';
	protected $_Smethod =  'index';
	protected $_Aparams = [];
	protected $_ScontrollerFileExistString = "app/controllers/"; 
	protected $_OcontrollerObj;
		
	public function __construct(){
		$this->setController();

		require_once $this->_ScontrollerFileExistString.$this->_Scontroller.PHPEXT;
		$this->_OcontrollerObj = new $this->_Scontroller();
		$this->setMethod();
		$this->setParams();
		call_user_func([$this->_OcontrollerObj,$this->_Smethod],$this->_Aparams);

	}

	public function setController(){
		if(!empty($_REQUEST['controller'])&&file_exists($this->_ScontrollerFileExistString.$_REQUEST['controller'].PHPEXT))
			$this->_Scontroller = $_REQUEST['controller'];		
	}

	public function setMethod(){
		if(!empty($_REQUEST['method'])&&method_exists($this->_OcontrollerObj, $_REQUEST['method']))
			$this->_Smethod = $_REQUEST['method'];			
	}

	public function setParams(){
		if(!empty($_REQUEST['params']))
			$this->_Aparams = $_REQUEST['params'];			
	}

}