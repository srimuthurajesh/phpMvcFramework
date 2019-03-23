<?php

class Controller{
	public function model($model){
		require_once 'app/models/'.$model.PHPEXT;
		return new $model();
	}

	public function view($view,$data=[]){
		require_once 'app/views/'.$view.PHPEXT;
	}	
	
}
