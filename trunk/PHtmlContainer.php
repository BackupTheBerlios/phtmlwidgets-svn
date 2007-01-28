<?php
/* $Id$ */

class PHtmlContainer {
	protected $xmlns;
	protected $lang;
	protected $direction;
	protected $dom;
	protected $elements;

	public function __construct($xmlns = 'http://www.w3.org/1999/xhtml', $lang = 'en', $dir = 'ltr') {
		$this->dom = new DOMDocument();
		$this->xmlns = $xmlns;
		$this->lang = $lang;
		$this->direction = $dir;
	}

	public function & createElement($name, $value = null) {
		return $this->dom->createElement($name, $value);
	}

	public function & createTable($rows = 1, $cols = 1) {
		$t = new PHTMLTable($rows, $cols);
		return $t;
	}

	public function saveHTML() {
		return $this->saveXML();
	}

	public function __set($name, DOMNode $n) {
		$this->elements[$name] = $n;
	}

	public function __get($name) {
		return $this->elements[$name];
	}

	public function saveXML() {
		//create the html node
		$this->dom->appendChild($this->dom->createComment('DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'));
		$this->dom->appendChild($html = $this->dom->createElementNS($this->xmlns, 'html'));
		$html->setAttribute('xml:lang', $this->lang);
		$html->setAttribute('lang', $this->lang);
		$html->setAttribute('dir', $this->direction);
		//create the head node
		$html->appendChild($head = $this->createElement('head'));
		//create the body node
		$html->appendChild($body = $this->createElement('body'));
		foreach($this->elements as $element) {
			$body->appendChild($element);
		}
		return $this->dom->saveXML();
	}

	public function __toString() {
		return $this->saveHTML();
	}
}