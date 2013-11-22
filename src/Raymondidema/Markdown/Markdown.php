<?php namespace Raymondidema\Markdown;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use dflydev\markdown\MarkdownParser as MarkdownParser;

class Markdown
{
	/**
	 * Set the desired location
	 * @var string Path
	 */
	protected $location;

	/**
	 * Needed for a new Markdown Parser
	 * @var object
	 */
	protected $markdownParser;

	/**
	 * Constructs the location and markdown
	 */
	public function __construct()
	{
		$this->location = Config::get('markdown::location');
		$this->markdownParser = new MarkdownParser;
	}

	/**
	 * Change location
	 * @param string $location Path of location
	 */
	public function setLocation($location)
	{
		$this->location = $location;
	}

	/**
	 * Render engine
	 * @param  string $name filename without .md
	 * @return string       Returns formatted Markdown
	 */
	public function render($name)
	{
		return $this->transform($this->fileExists($name));
	}

	/**
	 * Transforms the file to readable data
	 * @param  string $file Filename
	 * @return string       Returns Markdown
	 */
	public function transform($file)
	{
		$markdown = $this->markdownParser;
		return $markdown->transformMarkdown($file);
	}

	/**
	 * Checks if file exsits
	 * @param  string $file filename without .md
	 * @return data         The file himself
	 */
	public function fileExists($file)
	{
		if(! File::exists($this->location.'/'.$file.'.md'))
			return 'File does not exists';

		return File::get($this->location.'/'.$file.'.md');

	}
}