<?php

class LoaderFilterBackend extends sfFilter {

    public function execute($filterChain) {

        $context = $this->getContext();
        $this->addStyleSheets($context);

        $filterChain->execute();
    }



    public function addStyleSheets(sfContext $context){
        $context->getResponse()->addStyleSheet('be/global.css');
        $context->getResponse()->addStyleSheet('be/default.css');
        
    }

}

?>
