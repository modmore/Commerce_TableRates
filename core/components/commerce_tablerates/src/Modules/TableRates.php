<?php
namespace modmore\CommerceTableRates\Modules;
use modmore\Commerce\Modules\BaseModule;
use modmore\Commerce\Dispatcher\EventDispatcher;

class TableRates extends BaseModule {

    public function getName()
    {
        $this->adapter->loadLexicon('commerce_tablerates:default');
        return $this->adapter->lexicon('commerce_tablerates');
    }

    public function getAuthor()
    {
        return 'Mark Hamstra';
    }

    public function getDescription()
    {
        return $this->adapter->lexicon('commerce_tablerates.module_description');
    }

    public function initialize(EventDispatcher $dispatcher)
    {
        // Load our lexicon
        $this->adapter->loadLexicon('commerce_tablerates:default');

        // Add the xPDO package, so Commerce can detect the comProduct derivative class
        $path = dirname(dirname(__DIR__)) . '/model/';
        $this->adapter->loadPackage('commerce_tablerates', $path);
    }
}
