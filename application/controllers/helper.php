<?php

('BASEPATH') OR exit('No direct script access allowed');

require('mailin.php');

function sendEmail($from, $to, $name, $subject, $message) {
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","4FIxbHNGKSERPB0M");
    $data = array( 
        "to"        => array($to=>$name),
        "from"      => $from,
        "subject"   => $subject,
        "html"      => $message,
    );
    // return var_dump($mailin->send_email($data));
    $mailin->send_email($data);
}

?>