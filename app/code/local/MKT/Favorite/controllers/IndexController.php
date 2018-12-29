<?php
class MKT_Favorite_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/favorite?id=15 
    	 *  or
    	 * http://site.com/favorite/id/15 	
    	 */
    	/* 
		$favorite_id = $this->getRequest()->getParam('id');

  		if($favorite_id != null && $favorite_id != '')	{
			$favorite = Mage::getModel('favorite/favorite')->load($favorite_id)->getData();
		} else {
			$favorite = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($favorite == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$favoriteTable = $resource->getTableName('favorite');
			
			$select = $read->select()
			   ->from($favoriteTable,array('favorite_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$favorite = $read->fetchRow($select);
		}
		Mage::register('favorite', $favorite);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}