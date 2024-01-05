<?php
//plugins/generic/ompstat/ompstatHandler.inc.php

import('classes.handler.Handler');
import('lib.pkp.pages.index.PKPIndexHandler');


class ompstatHandler extends Handler {
  public function index($args, $request) {
    $plugin = PluginRegistry::getPlugin('generic', 'ompstat');
    $templateMgr = TemplateManager::getManager($request);
    $route = $request->getRequestedPage();

    if ($route === 'ompstat') {
        // Atribua a variável $meuTeste ao TemplateManager
        $templateMgr->assign('meuTeste', $plugin->meuTeste);
        //resgatando a funcao do arquivo principal e enviando ao arquivo tpl
        $templateMgr->assign('obterDados', $plugin->obterDados());
        $templateMgr->assign('obterLivros', $plugin->obterLivros());
        return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
    }

    $router = $request->getRouter();
    $router->handle404();

    return false;
}

}
