<?php
	function __autoload($className){
		$repClasses='model/';
		include $repClasses.$className.'.class.php';
	}
?>