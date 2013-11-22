<?php namespace Raymondidema\Markdown\Facades;

use Illuminate\Support\Facades\Facade;

class Markdown extends Facade
{
	/**
	 * Get Markdown
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'markdown'; }
}