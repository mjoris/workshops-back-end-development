<?php

namespace Ikdoeict;

class DemoBase {

	private ?string $what;

	public function __construct(?string $what) {
		$this->what = $what;
	}

	public function go() : ?string {
		return $this->what;
	}
}