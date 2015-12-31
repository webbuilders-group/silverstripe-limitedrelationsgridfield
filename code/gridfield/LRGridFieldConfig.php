<?php
class LRGridFieldConfig_RelationEditor extends GridFieldConfig_RelationEditor
{
    public function __construct($itemsPerPage=null, $numberToLimitTo=null)
    {
        parent::__construct($itemsPerPage);
        
        $this->removeComponentsByType('GridFieldAddExistingAutocompleter');
        $this->addComponent(new LRGridFieldAddExistingAutocompleter('buttons-before-right', null, $numberToLimitTo));
        
        $this->removeComponentsByType('GridFieldDetailForm');
        $this->addComponent(new LRGridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}

class LRGridFieldConfig_RecordEditor extends GridFieldConfig_RecordEditor
{
    public function __construct($itemsPerPage=null, $numberToLimitTo=null)
    {
        parent::__construct($itemsPerPage);
        
        
        $this->removeComponentsByType('GridFieldDetailForm');
        $this->addComponent(new LRGridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}
