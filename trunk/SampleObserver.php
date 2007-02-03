<?php
/* $Id */

class SampleObserver implements SplObserver {
	public function update(SplSubject $s) {
		$cell = $s->getCell(2, 2);
		$cell->appendChild(new DOMElement('span', ' :: Observed ::'));
	}
}