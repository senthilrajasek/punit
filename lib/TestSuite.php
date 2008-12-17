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
		echo 'TestSuite.php : Cannot locate config.php';
	}
}

require_once( ABSPATH . PUNIT_PATH . 'TestCase.php');
require_once( ABSPATH . PUNIT_PATH . 'TestResult.php');

Class TestSuite
{

private $name;

protected $testCases;
protected $testResults;

public function add( $_case )
{
	$this->testCases[$_case] =  array( 'name' => $_case, 'result' => new TestResult() );
}

private function getFileName( $_case )
{
	$fileName = $_case['name'] . '.php';
	
	return $fileName;
}

private function getClassName( $_case )
{
	$className = $_case['name'];
	
	return $className;
}

private function getTestResult( $_case )
{	
	$result = $_case['result'];
	return $result;
}

public function run()
{	
	foreach( $this->testCases as $testCase)
	{
		$fileName = self::getFileName( $testCase );	
		$className = self::getClassName( $testCase );
		$testResult = self::getTestResult( $testCase );
				
		echo $fileName, PHP_EOL;
		
		echo ' Loading ' , $fileName;
		
		require_once( $fileName );
		
		try
		{
			$class = new ReflectionClass( $className );
	
			if( $class && $class->isInstantiable() )
			{
				$instance = $class->newInstance();
			}
			else
			{
				throw new Exception($className 
								. ' could not be instantiated' );
			}
			
			$testResult->setName( $className );			
			$testResult->setStartTime( time() );
			
			$method = $class->getMethod( 'setUp' );
			echo ' Invoking Setup ', PHP_EOL;
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
	
				echo 'Invoking Method : ' , $methodName, PHP_EOL;
				$m->invoke( $instance );
				
				$testResult->setSuccess( $methodName );
			}
	
			$method = $class->getMethod( 'tearDown' );
			echo ' Invoking Teardown ', PHP_EOL;
			$method->invoke( $instance ) ;
			echo 'tearDown() method accessed successfully!', PHP_EOL;
			
			$testResult->setEndTime( time() );
			
		}
		catch( Exception $ex)	
		{
			echo ' Error creating class ' , $ex->getMessage(), PHP_EOL;
			$testResult->setFailure( $methodName );
			$testResult->setEndTime( time() );
		}
		
		$this->testResults[] = $testResult;
	}
}


public function getName()
{
	return $this->name;
}

public function setName( $_name )
{
	$this->name = $_name;
}

public function getResults()
{
	return $this->testResults;
}

}

?>