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

require_once ( ABSPATH . PUNIT_PATH . 'TestSuite.php' );


$suite = new TestSuite();

$suite->setName( 'hello' );

echo 'Suite name ',  $suite->getName();

$suite->add( 'TestClassA' );

$suite->run();

$results = $suite->getResults();

foreach( $results as $result )
{
	echo ' Test Case Name : ' , $result->getName();
	echo ' Total Time : ', $result->getTotalTime();
	echo ' Successes : ', $result->getTotalSuccesses();
	echo ' Failures : ', $result->getTotalFailures();
	echo ' Errors : ', $result->getTotalErrors();
	
}

