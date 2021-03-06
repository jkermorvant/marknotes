<?php
/**
 * Analyze each URLs in the note and add a target="_blank"
 * in order to open the link in a new windows
 */

namespace MarkNotes\Plugins\Page\HTML;

defined('_MARKNOTES') or die('No direct access allowed');

class Links_Target extends \MarkNotes\Plugins\Page\HTML\Plugin
{
	protected static $me = __CLASS__;
	protected static $json_settings = 'plugins.page.html.links_target';
	protected static $json_options = '';

	/**
	 * Provide additionnal javascript
	 */
	public static function addJS(&$js = null) : bool
	{
		$aeFunctions = \MarkNotes\Functions::getInstance();
		$aeSettings = \MarkNotes\Settings::getInstance();

		$url = rtrim($aeFunctions->getCurrentURL(), '/').'/';
		$url .= 'marknotes/plugins/page/html/links_target/';

		$script = "<script src=\"".$url."links_target.js\" ".
			"defer=\"defer\"></script>\n";

		$js .= $aeFunctions->addJavascriptInline($script);

		return true;
	}

	/**
	 * Provide additionnal stylesheets
	 */
	public static function addCSS(&$css = null) : bool
	{
		return true;
	}

	/**
	 * Add/modify the HTML content
	 */
	public static function doIt(&$html = null) : bool
	{
		return true;
	}

	/**
	 * Verify if the plugin is well needed and thus have a reason
	 * to be fired
	 */
	final protected static function canRun() : bool
	{
		$bCanRun = parent::canRun();

		if ($bCanRun) {

			$aeSession = \MarkNotes\Session::getInstance();
			$filename = trim($aeSession->get('filename', ''));

			if ($filename !== '') {
				// Don't run add_icons for PDF exportation
				// (will give errors with decktape)
				$aeFiles = \MarkNotes\Files::getInstance();
				$ext = $aeFiles->getExtension($filename);
				$bCanRun = !(in_array($ext, array('pdf', 'reveal.pdf', 'remark.pdf')));
			}
		}

		return $bCanRun;
	}
}
