<?php

class HomePage extends Controller{
	public function index($arg){
		//model
		$this->model('User');
		
		//view
		$data['name'] = $arg;
		$this->view('home',$data);
	}
}
