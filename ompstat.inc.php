<?php
//plugins/generic/ompstat/ompstat.inc.php
import('lib.pkp.classes.plugins.GenericPlugin');
class ompstat extends GenericPlugin {
	public function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path, $mainContextId);
		if ($success && $this->getEnabled()) {
			HookRegistry::register('LoadHandler', array($this, 'setPageHandler'));
		}
		return $success;
  }
	public function setPageHandler($hookName, $params) {
		$page = $params[0];
		if ($page === 'ompstat') {
			$this->import('ompstatHandler');
			define('HANDLER_CLASS', 'ompstatHandler');
			return true;
		}
		return false;
	}
	public function getDisplayName() {
		return 'Omp Stat';
	}

	/**
	 * Provide a description for this plugin
	 *
	 * The description will appear in the Plugin Gallery where editors can
	 * install, enable and disable plugins.
	 */
	public function getDescription() {
		return 'Omp stat';
	}
}
