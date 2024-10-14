<?php

namespace Ikdoeict\Demo;

// @note: it will look up `Foo` in the current namespace!
class Bar extends Foo {

	public function __construct(?string $what) {
		parent::__construct($what);
	}

	public function someFunc() : string {
		return 'Fo Shizzle!';
	}

}