<?php

if( defined( 'ABSPATH' ) )
	require_once( ABSPATH . 'config.php' );
else
{
	if( file_exists( 'config.php' ) )
	{
		require_once( 'config.php' );
	}
	else if( file_exists( '../config.php' ) )
	{
		require_once( '../config.php' );
	}
	else
	{
		echo 'TestResult.php : Cannot locate config.php';
	}
}

Class TestResult
{

protected $successes;

protected $failures;
protected $errors;


}

?>