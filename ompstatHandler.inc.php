<?php
//plugins/generic/ompstat/ompstatHandler.inc.php

    
import('classes.handler.Handler');
class ompstatHandler extends Handler {
	public function index($args, $request) {
		$plugin = PluginRegistry::getPlugin('generic', 'ompstat');
    $templateMgr = TemplateManager::getManager($request);
    //resgatando variavel do arquivo principal e enviando ao tpl - no caso está em outro php com outra classe
    $templateMgr->assign('meuTeste2', MeusObjetos::$meuTeste2);

    //resgate variavel sem funcao do arquivo principal
    $templateMgr->assign('meuTeste1', $plugin->meuTeste1);

    return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
  }
}
