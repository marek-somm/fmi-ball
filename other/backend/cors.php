<?php

header("Access-Control-Allow-Origin: *");

if (
	isset($_SERVER['REQUEST_METHOD'])
	&& $_SERVER['REQUEST_METHOD'] === 'OPTIONS'
) {
	// need preflight here
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	// add cache control for preflight cache
	// @link https://httptoolkit.tech/blog/cache-your-cors/
	header('Access-Control-Max-Age: 86400');
	header('Cache-Control: public, max-age=86400');
	header('Vary: origin');
	// just exit and CORS request will be okay
	// NOTE: We are exiting only when the OPTIONS preflight request is made
	// because the pre-flight only checks for response header and HTTP status code.
	exit(0);
}