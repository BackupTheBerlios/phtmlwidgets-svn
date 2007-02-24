<?php
/* $Id$ */

class PHtmlContainer {
	protected $xmlns;
	protected $lang;
	protected $direction;
	protected $dom;
	protected $elements = array();

	public function __construct($xmlns = 'http://www.w3.org/1999/xhtml', $lang = 'en', $dir = 'ltr') {
		$this->dom = new DOMDocument();
		$this->xmlns = $xmlns;
		$this->lang = $lang;
		$this->direction = $dir;
		
		//create the html node
		$this->dom->appendChild($html = $this->dom->createElementNS($this->xmlns, 'html'));
		$html->setAttribute('xml:lang', $this->lang);
		$html->setAttribute('lang', $this->lang);
		$html->setAttribute('dir', $this->direction);
		$html->appendChild($this->head = &$this->createElement('head'));
		$html->appendChild($this->body = &$this->createElement('body'));
	}

	public function & createElement($name, $value = null) {
		return $this->dom->createElement($name, $value);
	}

	public function & createTable($rows = 1, $cols = 1) {
		$table = $this->dom->appendChild(new PHTMLTable($rows, $cols));
		for($i = 0; $i < $table->getRowsNumber(); $i++) {
			$row = $table->appendChild($this->createElement('tr'));
			for($j = 0; $j < $table->getColumnsNumber(); $j++) {
				$col = & $table->getCell($i, $j);
				$row->appendChild($col = $this->createElement('td'));
			}
		}
		return $table;
	}

	public function saveXML() {
		return $this->saveHTML();
	}

	public function setNode($name, $n) {
		$this->elements[$name] = $n;
	}

	public function & getNode($name) {
		return $this->elements[$name];
	}

	public function saveHTML() {
		foreach($this->elements as $element) {
			$this->body->appendChild($element);
		}
		return $this->dom->saveHTML();
	}

	public function __toString() {
		return $this->saveHTML();
	}
}