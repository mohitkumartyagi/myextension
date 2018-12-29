<?php

class MKT_Favorite_Block_Adminhtml_Favorite_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('favoriteGrid');
      $this->setDefaultSort('favorite_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('favorite/favorite')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('favorite_id', array(
          'header'    => Mage::helper('favorite')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'favorite_id',
      ));
      $this->addColumn('customer_id', array(
          'header'    => Mage::helper('favorite')->__('Customer ID'),
          'align'     =>'left',
          'index'     => 'customer_id',
      ));
	  $this->addColumn('product_id', array(
          'header'    => Mage::helper('favorite')->__('Product ID'),
          'align'     =>'left',
          'index'     => 'product_id',
      ));
	  $this->addColumn('store_id', array(
          'header'    => Mage::helper('favorite')->__('Store ID'),
          'align'     =>'left',
          'index'     => 'store_id',
      ));
	  $this->addColumn('qty', array(
          'header'    => Mage::helper('favorite')->__('Qty'),
          'align'     =>'left',
          'index'     => 'qty',
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('favorite')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('favorite')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('favorite')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('favorite')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('favorite')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('favorite_id');
        $this->getMassactionBlock()->setFormFieldName('favorite');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('favorite')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('favorite')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('favorite/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('favorite')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('favorite')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}