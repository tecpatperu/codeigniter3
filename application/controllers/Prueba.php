<?php namespace App\Controllers;


class Prueba extends BaseController {

 public function index()
 {
//  header('Content-Type: application/json');
  //$this->load->model("prueba");
  //$arr = $this->prueba->getAll();
  //echo json_encode($arr);
  	//echo json_encode('hola');
  return view ('Prueba');
 }
}