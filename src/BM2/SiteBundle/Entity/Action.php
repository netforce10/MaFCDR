<?php 

namespace BM2\SiteBundle\Entity;

class Action {

	public function __toString() {
		return "action {$this->id} - {$this->type}";
	}


	public function onPreRemove() {
		// this doesn't work with cascade
		if ($this->character) {
			$this->character->removeAction($this);
		}
		if ($this->target_settlement) {
			$this->target_settlement->removeRelatedAction($this);
		}
		if ($this->target_battlegroup) {
			$this->target_battlegroup->removeRelatedAction($this);
		}
	}
}
