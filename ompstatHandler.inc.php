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
          // Obtenha a quantidade de livros publicados
          $ompstatDAO = new ompstatDAO();
          $livrosPublicados = $ompstatDAO->getLivrosPublicados();

          // Atribua a variável $livrosPublicados ao TemplateManager
          $templateMgr->assign('livrosPublicados', $livrosPublicados);

          // Atribua a variável $meuTeste ao TemplateManager
          $templateMgr->assign('meuTeste', $plugin->meuTeste);

          return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
      }

      $router = $request->getRouter();
      $router->handle404();

      return false;
  }

}
