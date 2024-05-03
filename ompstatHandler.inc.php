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

        // Obtenha a quantidade de acessos totais
        $totalAcessos = $ompstatDAO->gettotalAcessos();
        $templateMgr->assign('totalAcessos', $totalAcessos);

        // Obtenha a quantidade de download totais
        $totalDownloads = $ompstatDAO->gettotalDownloads();
        $templateMgr->assign('totalDownloads', $totalDownloads);

        // Obtenha a quantidade de series publicadas
        $seriesPublicadas = $ompstatDAO->getseriesPublicadas();
        $templateMgr->assign('seriesPublicadas', $seriesPublicadas);

        // Obtenha a quantidade de categorias publicadas
        $totalCategorias = $ompstatDAO->gettotalCategorias();
        $templateMgr->assign('totalCategorias', $totalCategorias);

        // Obtenha a quantidade de usuarios cadastrados
        $totalUsuarios = $ompstatDAO->gettotalUsuarios();
        $templateMgr->assign('totalUsuarios', $totalUsuarios);

        // Obtenha a quantidade de Autores
        $totalAutores = $ompstatDAO->totalAutores();
        $templateMgr->assign('totalAutores', $totalAutores);

        $downloadsPorMes = $ompstatDAO->getDownloadsPorMes();
        $templateMgr->assign('downloadsPorMes', $downloadsPorMes);

        $acessosPorMes = $ompstatDAO->getacessosPorMes();
        $templateMgr->assign('acessosPorMes', $acessosPorMes);

         
        // Atribua a variável $meuTeste ao TemplateManager
        $templateMgr->assign('meuTeste', $plugin->meuTeste);

          return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
      }

      $router = $request->getRouter();
      $router->handle404();

      return false;
  }

}
