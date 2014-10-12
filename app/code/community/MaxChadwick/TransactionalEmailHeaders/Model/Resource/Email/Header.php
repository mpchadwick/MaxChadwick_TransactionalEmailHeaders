<?php
 
class MaxChadwick_TransactionalEmailHeaders_Model_Resource_Email_Header extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('transactionalemailheaders/email_header', 'header_id');
    }
}