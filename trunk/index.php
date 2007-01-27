<?php
/* $Id$ */

require_once 'includes.php';

$c = new PHtmlContainer();
$c->div = $c->createElement('div', 'test');
$c->div->appendChild($c->createElement('h1', 'Hello world!'));
print $c;
