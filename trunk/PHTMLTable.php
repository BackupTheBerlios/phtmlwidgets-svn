<?php
/* $Id$ */

class PHTMLTable extends DOMElement implements SplSubject {
	protected $rows = 1;
	protected $cols = 1;
	protected $cellsAttributes = array(array(array()));
	protected $cellsNodes = array(array(array()));
	protected $observers = array();

	public function __construct($rows = 1, $cols = 1) {
		$this->rows = $rows;
		$this->cols = $cols;
		parent::__construct('table');
	}

	public function attach(SplObserver $o) {
		$this->observers[md5(serialize($o))] = $o;
	}

	public function detach(SplObserver $o) {
		unset($this->observers[md5(serialize($o))]);
	}

	public function notify() {
		foreach($this->observers as $id => $o) {
			$o->update($this);
		}
	}

	public function getRowsNumber() {
		return $this->rows;
	}

	public function getColumnsNumber() {
		return $this->cols;
	}

	public function & getCell($row, $col) {
		return $this->cellsNodes[$row][$col];
	}

	public function setCellAttribute($row, $col, $name, $value) {
		$this->cellsAttributes[$row][$col][$name] = $value;
	}

	public function getCellAttribute($row, $col, $name) {
		return $this->cellsAttributes[$row][$col][$name];
	}

	public function setCellStyle($row, $col, $style) {
		if (!empty($this->cellsAttributes[$row][$col]['style'])) {
			$this->cellsAttributes[$row][$col]['style'] .= ";$style";
		} else {
			$this->cellsAttributes[$row][$col]['style'] = $style;
		}
	}

	public function getCellStyle($row, $col, $name) {
		return explode(';', $this->cellsAttributes[$row][$col]['style']);
	}
}