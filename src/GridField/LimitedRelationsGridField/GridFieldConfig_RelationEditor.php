<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter as SS_GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor as SS_GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDetailForm as SS_GridFieldDetailForm;

class GridFieldConfig_RelationEditor extends  SS_GridFieldConfig_RelationEditor
{
    public function __construct($itemsPerPage = null, $numberToLimitTo = null)
    {
        parent::__construct($itemsPerPage);

        $this->removeComponentsByType(SS_GridFieldAddExistingAutocompleter::class);
        $this->addComponent(new GridFieldAddExistingAutocompleter('buttons-before-right', null, $numberToLimitTo));

        $this->removeComponentsByType(SS_GridFieldDetailForm::class);
        $this->addComponent(new GridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}
