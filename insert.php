<?php

	$bank = $_POST['banks'];
	if(empty($bank)){
		$bank = "northwestHarvest";
		$db_name = "northwestHarvest";
	}
?>