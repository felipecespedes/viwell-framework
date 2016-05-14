<?php
/*
|--------------------------------------------------------------
| Global functions
|--------------------------------------------------------------
|
| All global functions are defined in this file
|
*/

/**
* Finalize the program execution and print a message
*
* @param string $message
*/
function fin($message = "PHP Exit.")
{
	print_r($message);
	exit;
}