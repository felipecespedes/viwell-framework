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
* Finalize the program execution and print a error message
*
* @param string $errorMessage
* @param number $statusCode
*/
function fin($errorMessage = "An internal error has occurred.", $statusCode = 500) {

	http_response_code($statusCode);

	die($errorMessage);
}
