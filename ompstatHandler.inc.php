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
          $ompstatDAO = new ompstatDAO();
          // Obtenha a quantidade de livros publicados
          $livrosPublicados = $ompstatDAO->getLivrosPublicados();
          $templateMgr->assign('livrosPublicados', $livrosPublicados);

         // Obtenha a quantidade de livros publicados
         $totalAcessos = $ompstatDAO->gettotalAcessos();
         $templateMgr->assign('totalAcessos', $totalAcessos);
         
          // Atribua a variável $meuTeste ao TemplateManager
          $templateMgr->assign('meuTeste', $plugin->meuTeste);

          return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
      }

      $router = $request->getRouter();
      $router->handle404();

      return false;
  }

}
