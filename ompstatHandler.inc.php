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


/*** 
       // Obtenha a lista de meses
    $monthsList = $ompstatDAO->getyearsList();
    $templateMgr->assign('monthsList', $monthsList);
*/
    // Calcula as métricas para cada mês
    $metricsPorMes = array();
    foreach ($monthsList as $mes) {
        $metricsPorMes[$mes] = $ompstatDAO->getMetricsPorMes($mes);
    }
    $templateMgr->assign('metricsPorMes', $metricsPorMes);
        
         
        // Atribua a variável $meuTeste ao TemplateManager
        $templateMgr->assign('meuTeste', $plugin->meuTeste);

          return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
      }

      $router = $request->getRouter();
      $router->handle404();

      return false;
  }

}
