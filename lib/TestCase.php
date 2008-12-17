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
	
	else if( file_exists( '../../config.php' ) )
	{
		require_once( '../../config.php' );
	}
	else
	{
		echo 'TestCase.php : Cannot locate config.php';
	}
}

require_once( ABSPATH . PUNIT_PATH . 'testcases.css');
require_once( ABSPATH . PUNIT_PATH . 'HtmlMessages.php');

abstract Class TestCase
{

}

/***
 * Asserts if the two values are equal.
 *
 *
 */
function AssertEqual($a, $b, $successMessage = null, $failureMessage = null )
{
	if( !$successMessage )
		$successMessage = "TestCase.php -- AssertEqual() : Success.";
	if( !$errorMessage )
		$errorMessage = "TestCase.php -- AssertEqual() : Failed.";
		
	if( $a == $b )
	{
		printHtmlSuccess( $successMessage );
	}
	else
	{
		printHtmlFailure( $errorMessage );
		debug_print_backtrace();
		exit;
	}
}

function AssertTrue( $value, $successMessage = null, $errorMessage = null )
{
	if( !$successMessage )
		$successMessage = "TestCase.php -- AssertTrue() : Success.";
	if( !$errorMessage )
		$errorMessage = "TestCase.php -- AssertTrue() : Failed.";
		
	if( $value )
	{
		printHtmlSuccess( $successMessage );
		return true;
	}
	else
	{
		printHtmlFailure( $errorMessage );
		debug_print_backtrace();
		exit;
	}
}

function AssertNotNull( $object, $successMessage = null, $errorMessage = null )
{
	if( !$successMessage )
		$successMessage = "TestCase.php -- AssertNotNull() : Success.";
	if( !$errorMessage )
		$errorMessage = "TestCase.php -- AssertNotNull() : Failed.";
		
	if( $object )
	{
		printHtmlSuccess( $successMessage );
		return true;
	}
	else
	{
		printHtmlFailure( $errorMessage );
		debug_print_backtrace();
		exit;
	}
}


?>
