<?php

// get the list of TestSuites 
foreach( glob("Test*.php") as $file)
{
	echo 'TestSuite : ' . $file;
	$className = substr( $file, 0, -4 );
	echo $className;
	require( $file );
	try
	{
		$class = new ReflectionClass( $className );

		if( $class->isInstantiable() )
		{
			$instance = $class->newInstance();
		}
		else
		{
			throw new Exception($className 
					. ' could not be instantiated' );
		}

		$method = $class->getMethod( 'setUp' );
		echo 'setUp() method accessed successfully!';
		echo ' Invoking Setup ';
		$method->invoke( $instance ) ;
		// invoke Test Methods
		$methods = $class->getMethods();
		echo 'Iterating over methods ' , PHP_EOL;
		foreach( $methods as $m )
		{
			$methodName =  $m->getName();
			if( strcmp( $methodName, 'setUp' ) == 0 ||
			    strcmp( $methodName, 'tearDown' ) == 0 )
			{
				continue;
			}

			echo 'Invoking Method : ' , $methodName;
			$m->invoke( $instance );
		}

		$method = $class->getMethod( 'tearDown' );
		echo ' Invoking Teardown ';
		$method->invoke( $instance ) ;
		echo 'tearDown() method accessed successfully!';
	}
	catch( Exception $ex)	
	{
		echo ' Error creating class ' , $ex->getMessage();
		exit();
	}
}

// display buttons for running all test suites 
// display buttons for running individual test suites 

?>
