<?php
//plugins/generic/ompstat/ompstat.inc.php
import('lib.pkp.classes.plugins.GenericPlugin');
class ompstat extends GenericPlugin {
	public function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path, $mainContextId);
		if ($success && $this->getEnabled()) {
			HookRegistry::register('LoadHandler', array($this, 'setPageHandler'));
		}

		// Inclua o arquivo aqui
		include_once($this->getPluginPath() . '/meusobjetos/extra.php');

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
	
	//variavel sem funcao para passar ao handler e recuperar no tpl
	public $meuTeste1 = "varivável do arquivo principal";
	
	public function getDisplayName() {
		return 'Omp Stat';
	}

	public function getDescription() {
		return 'Omp stat';
	}
}