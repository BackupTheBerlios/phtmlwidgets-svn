<?php
/* $Id$ */

require_once 'includes.php';

$c = new PHtmlContainer();
$c->div = $c->createElement('div', 'test');
$c->div->appendChild($c->createElement('h1', 'Hello world!'));
$c->div->appendChild($table = $c->createTable(3, 3));
$cell = $table->getCell(2, 2);
$cell->appendChild(new DOMElement('span', 'lipsum and stuff'));
$table->notify();
print $c;
