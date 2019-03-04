<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Forms\GridField\GridFieldDetailForm as SS_GridFieldDetailForm;


class GridFieldDetailForm extends SS_GridFieldDetailForm {
    protected $itemRequestClass=GridFieldDetailForm_ItemRequest::class;
    protected $_item_limit=null;
    
    /**
     * Create a popup component. The two arguments will specify how the popup form's HTML and behaviour is created. The given controller will be customised, putting the edit form into the template with the given name.
     * The arguments are experimental API's to support partial content to be passed back to whatever controller who wants to display the getCMSFields
     * @param string $name The name of the edit form to place into the pop-up form
     */
    public function __construct($name='DetailForm', $itemLimit=0) {
        $this->name=$name;
        $this->_item_limit=$itemLimit;
    }
    
    /**
     * Sets the number of items to limit to
     * @param int $limit Number of items to limit the gridfield's relationship to
     * @return GridFieldAddExistingAutocompleter Returns self
     */
    public function setItemLimit($limit) {
        $this->_item_limit=$limit;
        
        return $this;
    }
    
    /**
     * Gets the number of items limited to
     * @return int Number of items the gridfield's relationship is limited to
     */
    public function getItemLimit() {
        return $this->_item_limit;
    }
}
?>