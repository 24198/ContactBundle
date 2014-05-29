<?php

namespace Tfone\Bundle\ContactBundle\EventListener\Datagrid;

use Tfone\Bundle\DatagridHelperBundle\Datagrid\DatagridHelper;

use Oro\Bundle\DataGridBundle\Event\BuildBefore;

/**
 * Event listener
 */
class ContactListener {
    
    /** @var DatagridHelper $datagridHelper */
    protected $datagridHelper;
    
    public function __construct(DatagridHelper $datagridHelper) {
        $this->datagridHelper = $datagridHelper;
    }
    
    public function buildBefore(BuildBefore $event) {
        $gridConfig = $event->getConfig();

        $this->datagridHelper->setGridConfig($gridConfig);
        $this->datagridHelper->removeColumns(array('firstName', 'lastName'));        
        $this->datagridHelper->enableFilters(array('countryName' => true));       
    }    
}