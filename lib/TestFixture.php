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
		echo 'TestFixture.php : Cannot locate config.php';
	}
}

abstract class TestFixture
{

public function setUp()
{
}


public function tearDown()
{
}

}

?>