<?php
if( defined( 'ABSPATH' ) )
	require_once( ABSPATH . 'config.php' );
else
{
	if( file_exists( 'config.php' ) )
	{
		require_once( 'config.php' );
	}
	else
	{
		echo 'TestSuiteClassA.php : Cannot locate config.php';
	}
}

require_once ( ABSPATH . 'lib/TestSuite.php' );


$suite = new TestSuite();

$suite->setName( 'hello' );

echo 'Suite name ',  $suite->getName();

$suite->add( 'TestClassA' );

$suite->run();

$suite->getResults();
