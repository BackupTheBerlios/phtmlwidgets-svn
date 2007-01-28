<?php
/* $Id$ */
class PHTMLTable extends DOMElement {
	protected $rows = 1;
	protected $cols = 1;
	protected $cells = array(array());

	public function __construct($rows = 1, $cols = 1) {
		$this->rows = $rows;
		$this->cols = $cols;
		parent::__construct('table');
	}
}