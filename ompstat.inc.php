<?php
//plugins/generic/ompstat/ompstat.inc.php
import('lib.pkp.classes.plugins.GenericPlugin');
import('lib.pkp.plugins.importexport.users.PKPUserImportExportPlugin');
import('plugins.generic.ompstat.ompstatDAO');
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
	

	public function obterDados() {
        //depende diretamente de ompstatdao
        $ompstatDAO = new ompstatDAO();
    
        try {
            $dados = $ompstatDAO->obterDados();
    
            if (count($dados) > 0) {
                return $dados;
            } else {
                return "Nenhum resultado encontrado";
            }
        } catch (Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    }


	public function obterLivros() {
        //depende diretamente de ompstatdao
        $ompstatDAO = new ompstatDAO();
    
        try {
            $livros = $ompstatDAO->obterLivros();
    
            if (count($livros) > 0) {
                return $livros;
            } else {
                return "Nenhum resultado encontrado";
            }
        } catch (Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    }

	//variavel sem funcao para passar ao handler e recuperar no tpl
	public $meuTeste = "varivável do arquivo principal";
	









	public function getDisplayName() {
		return 'Estatísticas do Portal';
	}

	public function getDescription() {
		return 'Pagina estática para demonstrar as estatisticas gerais do portal OMP - /ompstat';
	}
}