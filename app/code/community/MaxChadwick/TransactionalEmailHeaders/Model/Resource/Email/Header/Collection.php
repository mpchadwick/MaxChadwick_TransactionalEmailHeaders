<?php
class MaxChadwick_TransactionalEmailHeaders_Model_Resource_Email_Header_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('transactionalemailheaders/email_header');
    }
}