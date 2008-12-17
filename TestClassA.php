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
		echo 'TestClassA.php : Cannot locate config.php';
	}
}


require_once ( ABSPATH . 'ClassA.php' );

require_once ( ABSPATH . PUNIT_PATH .'TestCase.php' );

Class TestClassA extends TestCase
{
	public function setUp()
	{
		echo ' TestClassA : setUp() ', PHP_EOL;
	}

	public function TestAdd()
	{
		$a = new ClassA();
		$sum = $a->Add( 2 , 4 );

		echo 'Sum: ' , $sum, PHP_EOL;

		sleep(1);
		
		AssertEqual( $sum, 6 );
	}

	public function tearDown()
	{
		echo ' TestClassA : tearDown() ', PHP_EOL;
	}

}

//Fake main
//$a = new TestClassA();
//$a->TestAdd();

?>
