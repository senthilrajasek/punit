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

require_once ( ABSPATH . 'lib/TestCase.php' );
require_once ( ABSPATH . 'ClassA.php' );

Class TestClassA extends TestCase
{
	public function setUp()
	{
		echo ' TestClassA : setUp() ************';
	}

	public function TestAdd()
	{
		$a = new ClassA();
		$sum = $a->Add( 2 , 4 );

		echo 'Sum: ' , $sum;

		AssertEqual( $sum, 6 );
	}

	public function tearDown()
	{
	}

}

//Fake main
//$a = new TestClassA();
//$a->TestAdd();

?>
