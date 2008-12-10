<?php
if( defined( 'ABSPATH' ) )
	require_once( ABSPATH . 'config.php' );
else
{
	if( file_exists( 'config.php' ) )
	{
		require_once( 'config.php' );
	}
	if( file_exists( '../config.php' ) )
	{
		require_once( '../config.php' );
	}
	else
	{
		echo 'ClassA.php : Cannot locate config.php';
	}
}

Class ClassA 
{

public function Add( $_a, $_b )
{

return $_a + $_b;

}

}

?>
