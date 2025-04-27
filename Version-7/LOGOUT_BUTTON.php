<?php
//set as the action for a logout button which uses html forms similar to the lab work thing we did for web dev

require_once 'session/session.php';
$session = new session();
$session->forgetSession();
