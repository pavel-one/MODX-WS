<?php

class WsExampleItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'WsExampleItem';
    public $classKey = 'WsExampleItem';
    public $languageTopics = ['wsexample'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('wsexample_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('wsexample_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'WsExampleItemCreateProcessor';