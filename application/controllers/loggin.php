<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loggin extends CI_Controller
{
  var $path, $filename, $date, $ip;

  public function __construct(){  
      parent::__construct();
      
      $path="/log/";

    //$path="./logs";
    $filename="log";
    $this->path     = ($path) ? $path : "/";
    $this->filename = ($filename) ? $filename : "log";
    $this->date     = date("Y-m-d H:i:s");
    $this->ip       = ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 0;
    
  }


//carrega vista log
  public function index()
  {
    $this->insert('teste','2018-11-08', false,true);
    $this->load->view('log_views');
  }



public function insert($text, $dated, $clear, $backup){
  if ($dated) {
    $date   = "_" . str_replace(" ", "_", $this->date);
    $append = null;
  }else {
    $date   = "";
    $append = ($clear) ? null : FILE_APPEND;
    if ($backup) {
      $result = (copy($this->path . $this->filename . ".log", $this->path . $this->filename . "_" . str_replace(" ", "_", $this->date) . "-backup.log")) ? 1 : 0;
      $append = ($result) ? $result : FILE_APPEND;
    }
  }

//
  $log    = $this->date . " [ip] " . $this->ip . " [text] " . $text . PHP_EOL;


  $data = $log;
  //$data = read_file('./log/oi.txt"');
  //$dados=$data."OI2 \r\n";
  //$caminho=$this->path.$this->filename.$date.".txt";
  //$caminho=$this->path."oi.txt";
  //$caminho="./log/oi.txt";
  //$caminho="./log/".$this->filename.".txt";
  $caminho="./log/";
  //$caminho= "./".$this->filename . $date . ".log";
  /*echo $caminho;
  if ( ! write_file($caminho, 'a'))
  {
          echo 'Unable to write the file';
  }
  else
  {
          echo 'File written!';
  }*/

  $result = (file_put_contents($caminho . $this->filename. ".log", $log, $append)) ? 1 : 0;
  echo $result;

  }

}//class