<?php
class PHtmlContainer {
	protected $dom;
	protected $elements;

	public function __construct($version = '1.0', $iso = 'iso-8859-1') {
		$this->dom = new DOMDocument($version, $iso);
	}

	public function & createElement($name, $value) {
		return $this->createElement($name, $value);
	}

	public function saveHTML() {
		return $this->dom->saveHTML();
	}

	public function __toString() {
		return $this->saveHTML();
	}
}