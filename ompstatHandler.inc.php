<?php
//plugins/generic/ompstat/ompstatHandler.inc.php

    
import('classes.handler.Handler');
class ompstatHandler extends Handler {
	public function index($args, $request) {
		$plugin = PluginRegistry::getPlugin('generic', 'ompstat');
    $templateMgr = TemplateManager::getManager($request);
    return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
  }
}
