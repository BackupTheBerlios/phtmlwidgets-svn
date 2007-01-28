<?php
/* $Id$ */

require_once 'includes.php';

$c = new PHtmlContainer();
$c->div = $c->createElement('div', 'test');
$c->div->appendChild($c->createElement('h1', 'Hello world!'));
$c->div->appendChild($c->createTable(3, 3));
print $c;
