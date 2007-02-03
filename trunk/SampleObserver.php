<?php
/* $Id$ */

class SampleObserver implements SplObserver {
	public function update(SplSubject $s) {
		$cell = $s->getCell(2, 2);
		$spans = $cell->getElementsByTagName('span');
		foreach($spans as $span) {
			$cell->removeChild($span);
		}
		$cell->appendChild(new DOMElement('span', ' :: Observed ::'));
	}
}