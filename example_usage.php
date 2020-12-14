<?php namespace Listener;

require('PaypalIPN.php');
$raw_post_data = file_get_contents('php://input');
file_put_contents('php://stderr', print_r($raw_post_data, TRUE));
use PaypalIPN;

$ipn = new PaypalIPN();

// Use the sandbox endpoint during testing.
$ipn->useSandbox();
$verified = $ipn->verifyIPN();
if ($verified) {
    /*
     * Process IPN
     * A list of variables is available here:
     * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
     */
}

// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
header("HTTP/1.1 200 OK");
