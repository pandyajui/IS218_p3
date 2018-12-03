<?php
  function GET($fieldname,&$flag_empty,&$flag_isset){
		$flag_empty=true;
		$flag_isset=false;
		$flag_isset=isset($_GET[$fieldname]);
		if($flag_isset==false){
			return;
		}
		$flag_isset=true;
		$v=$_GET[$fieldname];
		$v=trim($v);
		if($v==""){
		$flag_empty=true;
		return;}
		$flag_empty=false;
		return $v;
	}
 
  function errorReporting(){
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          return;
  }
  errorReporting();
?>