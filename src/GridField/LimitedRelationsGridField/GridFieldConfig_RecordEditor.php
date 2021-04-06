<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor as SS_GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDetailForm as SS_GridFieldDetailForm;

class GridFieldConfig_RecordEditor extends SS_GridFieldConfig_RecordEditor
{
    public function __construct($itemsPerPage = null, $numberToLimitTo = null)
    {
        parent::__construct($itemsPerPage);


        $this->removeComponentsByType(SS_GridFieldDetailForm::class);
        $this->addComponent(new GridFieldDetailForm('DetailForm', $numberToLimitTo));
    }
}
