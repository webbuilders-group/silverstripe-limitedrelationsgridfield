<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldDetailForm;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;


class GridFieldConfig_RelationEditor extends GridFieldConfig_RelationEditor {
    public function __construct($itemsPerPage=null, $numberToLimitTo=null) {
        parent::__construct($itemsPerPage);
        
        $this->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
        $this->addComponent(new GridFieldAddExistingAutocompleter('buttons-before-right', null, $numberToLimitTo));
        
        $this->removeComponentsByType(GridFieldDetailForm::class);
        $this->addComponent(new GridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}

class GridFieldConfig_RecordEditor extends GridFieldConfig_RecordEditor {
    public function __construct($itemsPerPage=null, $numberToLimitTo=null) {
        parent::__construct($itemsPerPage);
        
        
        $this->removeComponentsByType(GridFieldDetailForm::class);
        $this->addComponent(new GridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}
?>