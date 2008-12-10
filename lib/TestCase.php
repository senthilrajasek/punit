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
		echo 'TestCase.php : Cannot locate config.php';
	}
}

Abstract Class TestCase
{

}

/***
 * Asserts if the two values are equal.
 *
 *
 */
function AssertEqual($a, $b)
{
	if( $a == $b )
		echo 'Success.';
	else
	{
		echo 'Assert failed.';
		debug_print_backtrace();
		exit();
	}
}


?>
