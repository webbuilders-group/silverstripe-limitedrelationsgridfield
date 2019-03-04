<?php
namespace WebbuildersGroup\LimitedRelationsGridField;

use SilverStripe\Control\Controller;
use SilverStripe\Control\PjaxResponseNegotiator;
use SilverStripe\Forms\GridField\GridFieldDetailForm_ItemRequest as SS_GridFieldDetailForm_ItemRequest;


class GridFieldDetailForm_ItemRequest extends SS_GridFieldDetailForm_ItemRequest {
    public function doSave($data, $form) {
        if($this->record->ID==0 && $this->component instanceof GridFieldDetailForm && $this->component->getItemLimit()>0 && $this->gridField->getList()->count()+1>$this->component->getItemLimit()) {
            $controller=Controller::curr();
            
            $form->sessionMessage(_t('WebbuildersGroup\\LimitedRelationsGridField\\LimitedRelationsGridField.ITEM_LIMIT_REACHED', '_You cannot add any more items, you can only add {count} items. Please remove one then try again.', array('count'=>$this->component->getItemLimit())), 'bad');
            $responseNegotiator=new PjaxResponseNegotiator(array(
                                                                'CurrentForm'=>function() use(&$form) {
                                                                    return $form->forTemplate();
                                                                },
                                                                'default'=>function() use(&$controller) {
                                                                    return $controller->redirectBack();
                                                                }
                                                            ));
            
            if($controller->getRequest()->isAjax()){
                $controller->getRequest()->addHeader('X-Pjax', 'CurrentForm');
            }
            
            return $responseNegotiator->respond($controller->getRequest());
        }
        
        return parent::doSave($data, $form);
    }
}
?>