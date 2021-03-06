<?php
/**
 * Add a custom button to exit the editor
 */
namespace MarkNotes\Plugins\Buttons;

defined('_MARKNOTES') or die('No direct access allowed');

class ExitButton extends \MarkNotes\Plugins\Button\Plugin
{
	protected static $me = __CLASS__;
	protected static $json_settings = 'plugins.editor.exit';
	protected static $json_options = '';
}
