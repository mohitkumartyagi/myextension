<?php

class MKT_Savelater_Block_Adminhtml_Savelater_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('savelaterGrid');
      $this->setDefaultSort('savelater_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('savelater/savelater')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('savelater_id', array(
          'header'    => Mage::helper('savelater')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'savelater_id',
      ));

      $this->addColumn('customer_id', array(
          'header'    => Mage::helper('savelater')->__('Customer ID'),
          'align'     =>'left',
          'index'     => 'customer_id',
      ));
	  $this->addColumn('product_id', array(
          'header'    => Mage::helper('savelater')->__('Product ID'),
          'align'     =>'left',
          'index'     => 'product_id',
      ));
	  $this->addColumn('store_id', array(
          'header'    => Mage::helper('savelater')->__('Store ID'),
          'align'     =>'left',
          'index'     => 'store_id',
      ));
	  $this->addColumn('qty', array(
          'header'    => Mage::helper('savelater')->__('Qty'),
          'align'     =>'left',
          'index'     => 'qty',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('savelater')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('savelater')->__('Status'),
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
                'header'    =>  Mage::helper('savelater')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('savelater')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('savelater')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('savelater')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('savelater_id');
        $this->getMassactionBlock()->setFormFieldName('savelater');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('savelater')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('savelater')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('savelater/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('savelater')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('savelater')->__('Status'),
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