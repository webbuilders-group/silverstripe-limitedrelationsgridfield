<?php
class LRGridFieldAddExistingAutocompleter extends GridFieldAddExistingAutocompleter {
    protected $_item_limit=null;
    
    /**
     * Sets the number of items to limit to
     * @param {string} $targetFragment Fragment to place the component in
     * @param {array} $searchFields Which fields on the object in the list should be searched
     * @param {int} $limit Number of items to limit the gridfield's relationship to
     * @return {LRGridFieldAddExistingAutocompleter} Returns self
     */
    public function __construct($targetFragment='before', $searchFields=null, $itemLimit=null) {
        $this->_item_limit=$itemLimit;
        
        parent::__construct($targetFragment, $searchFields);
    }
    
    /**
     * If an object ID is set, add the object to the list
     *
     * @param GridField $gridField
     * @param SS_List $dataList
     * @return SS_List
     */
    public function getManipulatedData(GridField $gridField, SS_List $dataList) {
        if(!$gridField->State->GridFieldAddRelation) {
            return $dataList;
        }
        
        $objectID=Convert::raw2sql($gridField->State->GridFieldAddRelation);
        if($objectID) {
            $object=DataObject::get_by_id($dataList->dataclass(), $objectID);
            if($object) {
                if($this->_item_limit>0 && $dataList->count()+1>$this->_item_limit) {
                    Controller::curr()->getResponse()->addHeader('X-Status', _t('LimitedRelationsGridField.ITEM_LIMIT_REACHED', '_You cannot add any more items, you can only add {count} items. Please remove one then try again.', array('count'=>$this->_item_limit)));
                }else {
                    $dataList->add($object);
                }
            }
        }
        
        $gridField->State->GridFieldAddRelation=null;
        return $dataList;
    }
    
    /**
     * Sets the number of items to limit to
     * @param {int} $limit Number of items to limit the gridfield's relationship to
     * @return {LRGridFieldAddExistingAutocompleter} Returns self
     */
    public function setItemLimit($limit) {
        $this->_item_limit=$limit;
        
        return $this;
    }
    
    /**
     * Gets the number of items limited to
     * @return {int} Number of items the gridfield's relationship is limited to
     */
    public function getItemLimit() {
        return $this->_item_limit;
    }
}
?>