<?php namespace Sukohi\ClockLabel;

use Carbon\Carbon;

class ClockLabel {

	private $_types = [];
	private $_clock_labels = [];

	public function setLabel($types) {

		$this->_types = $types;
		return $this;

	}

	public function isFirst($dt) {

		$label = $this->get($dt, false);
		return (!in_array($label, $this->_clock_labels));

	}

	public function get($dt, $add_type_flag = true) {

		$clock_label = '';
		$year_month = $dt->format('Y-n');

		if($dt->isToday()) {

			$clock_label = $this->_types['today'];

		} else if($dt->isYesterday()) {

			$clock_label = $this->_types['yesterday'];

		} else if($year_month == date('Y-n')){

			$clock_label = $this->_types['this_month'];

		} else if($year_month == with(new Carbon())->subMonth()->format('Y-n')){

			$clock_label = $this->_types['last_month'];

		} else {

			$clock_label = $dt->format($this->_types['other']);

		}

		if($add_type_flag && !in_array($clock_label, $this->_clock_labels)) {

			$this->_clock_labels[] = $clock_label;

		}

		return $clock_label;

	}

}