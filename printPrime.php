<?php

function printPrime( $limit = 100 )
{
	 $i;
	
	while ( $i <= $limit)
	{
		//echo "i = " . $i . "\r\n";
		
		$j = floor( $i/2 );
		$k = 2;
		$prime = false;
		
		while( $k <= $j )
		{
		
		//echo "j = " . $j . "\r\n";
		
			if( ($i % $k) === 0  ) 
			{
		
				//echo " i % k = " . ($i % $k) ."\r\n";
				//echo "not a prime : i = " . $i . " j = " . $j . "k = " . $k . "\r\n";
				$prime = false;
				break;
			}
			
			//echo "i = " . $i . " j = " . $j . "k = " . $k . "\r\n";

			$prime = true;
			$k++;
			
		}
		
		//if( $prime )
		//	echo "We have a prime number : " . $i . "\r\n";
		
		$i++;
	}
}


printPrime( 10000 );


?>