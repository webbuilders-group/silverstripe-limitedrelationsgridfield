<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor as SS_GridFieldConfig_RelationEditor;


class GridFieldConfig_RelationEditor extends  SS_GridFieldConfig_RelationEditor {
    public function __construct($itemsPerPage=null, $numberToLimitTo=null) {
        parent::__construct($itemsPerPage);
        
        $this->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
        $this->addComponent(new GridFieldAddExistingAutocompleter('buttons-before-right', null, $numberToLimitTo));
        
        $this->removeComponentsByType(GridFieldDetailForm::class);
        $this->addComponent(new GridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}
?>