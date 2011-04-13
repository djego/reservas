<?php

class LoaderFilterFrontend extends sfFilter {

    public function execute($filterChain) {

        $context            = $this->getContext();
        $this->addJavascripts($context);
        $this->addStyleSheets($context);

        $filterChain->execute();
    }

    public function addJavascripts(sfContext $context) {
        $context->getResponse()->addJavascript('jquery-1.5.1.min.js');
        $context->getResponse()->addJavascript('jquery.badBrowser.js');
        $context->getResponse()->addJavascript('jquery.tools.min.js');
    }

    public function addStyleSheets(sfContext $context){
        $context->getResponse()->addStyleSheet('jquery-ui.css');

    }

}

?>
