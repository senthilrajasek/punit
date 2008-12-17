<?php
/**
 *
 *	Helper methods for test cases.
 *
 *
 */

if( defined( 'ABSPATH' ) )
	require_once ( ABSPATH . 'config.php' );
else
{	
	if( file_exists( '../config.php' ) )
	{
		require_once ( '../config.php' );
	}
	else if( file_exists( '../../config.php' ) )
	{
		require_once ( '../../config.php' );
	}
	else if( file_exists( 'config.php' ) )
	{
		require_once ( 'config.php' );
	}
}

function printHtmlSuccess( $message )
{
	echo '<p class="successMessage"> ', $message , ' </p>';
}

function printHtmlFailure( $message )
{
	echo '<p class="failureMessage"> ', $message , ' </p>';
}