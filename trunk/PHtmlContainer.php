<?php
/* $Id$ */

class PHtmlContainer {
	protected $lang;
	protected $dom;
	protected $elements;

	public function __construct($xmlns = 'http://www.w3.org/1999/xhtml', $lang = 'en') {
		$this->dom = new DOMDocument();
		$this->xmlns = $xmlns;
		$this->lang = $lang;
	}

	public function & createElement($name, $value = null) {
		return $this->dom->createElement($name, $value);
	}

	public function saveXML() {
		$this->saveHTML();
	}

	public function saveHTML() {
		$this->dom->appendChild($this->dom->createComment('DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-tranitional.dtd"'));
		$this->dom->appendChild($html = $this->dom->createElementNS($this->xmlns, 'html'));
		$html->setAttribute('xml:lang', $this->lang);
		$html->setAttribute('lang', $this->lang);
		return $this->dom->saveXML();
	}

	public function __toString() {
		return $this->saveHTML();
	}
}