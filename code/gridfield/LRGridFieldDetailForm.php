<?php
class LRGridFieldDetailForm extends GridFieldDetailForm
{
    protected $itemRequestClass='LRGridFieldDetailForm_ItemRequest';
    protected $_item_limit=null;
    
    /**
     * Create a popup component. The two arguments will specify how the popup form's HTML and behaviour is created. The given controller will be customised, putting the edit form into the template with the given name.
     * The arguments are experimental API's to support partial content to be passed back to whatever controller who wants to display the getCMSFields
     * 
     * @param {string} $name The name of the edit form to place into the pop-up form
     */
    public function __construct($name='DetailForm', $itemLimit=0)
    {
        $this->name=$name;
        $this->_item_limit=$itemLimit;
    }
    
    /**
     * Sets the number of items to limit to
     * @param {int} $limit Number of items to limit the gridfield's relationship to
     * @return {LRGridFieldAddExistingAutocompleter} Returns self
     */
    public function setItemLimit($limit)
    {
        $this->_item_limit=$limit;
        
        return $this;
    }
    
    /**
     * Gets the number of items limited to
     * @return {int} Number of items the gridfield's relationship is limited to
     */
    public function getItemLimit()
    {
        return $this->_item_limit;
    }
}

class LRGridFieldDetailForm_ItemRequest extends GridFieldDetailForm_ItemRequest
{
    public function doSave($data, $form)
    {
        if ($this->record->ID==0 && $this->component instanceof LRGridFieldDetailForm && $this->component->getItemLimit()>0 && $this->gridField->getList()->count()+1>$this->component->getItemLimit()) {
            $form->sessionMessage(_t('LimitedRelationsGridField.ITEM_LIMIT_REACHED', '_You cannot add any more items, you can only add {count} items. Please remove one then try again.', array('count'=>$this->component->getItemLimit())), 'bad');
            $responseNegotiator=new PjaxResponseNegotiator(array(
                                                                'CurrentForm'=>function () use (&$form) {
                                                                    return $form->forTemplate();
                                                                },
                                                                'default'=>function () use (&$controller) {
                                                                    return $controller->redirectBack();
                                                                }
                                                            ));
            
            $controller=Controller::curr();
            if ($controller->getRequest()->isAjax()) {
                $controller->getRequest()->addHeader('X-Pjax', 'CurrentForm');
            }
            
            return $responseNegotiator->respond($controller->getRequest());
        }
        
        return parent::doSave($data, $form);
    }
}
