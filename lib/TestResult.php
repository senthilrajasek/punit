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
		echo 'TestResult.php : Cannot locate config.php';
	}
}

Class TestResult
{

protected $name;

protected $startTime;
protected $endTime;

protected $successes;

protected $failures;
protected $errors;


public function getName()
{
	return $this->name;
}

public function setName( $_name )
{
	$this->name = $_name;
}

public function getStartTime()
{
	return $this->startTime;
}

public function setStartTime( $_time)
{
	return $this->startTime = $_time;
}

public function getEndTime()
{
	return $this->endTime;
}

public function setEndTime( $_time )
{
	return $this->endTime = $_time;
}

public function getTotalTime()
{
	return ($this->endTime - $this->startTime);
}

/**
 * Methods that succeeded
 *
 *
 */
public function setSuccess( $_method )
{
	$this->successes[] = $_method;
}


/**
 * Methods that failed
 *
 *
 */
public function setFailure( $_method )
{
	$this->failures[] = $_method;
}

/**
 * errors
 *
 *
 */
public function setErrors( $_method )
{
	$this->successes[] = $_method;
}

public function getTotalSuccesses()
{
	if( $this->successes && is_array( $this->successes) )
	{
		return count( $this->successes );
	}	
}

public function getTotalFailures()
{
	if( $this->failures && is_array( $this->failures ) )
	{
		return count( $this->failures );
	}
}

public function getTotalErrors()
{
	if( $this->errors && is_array( $this->errors ) )
	{
		return count( $this->errors );
	}
}

}

?>