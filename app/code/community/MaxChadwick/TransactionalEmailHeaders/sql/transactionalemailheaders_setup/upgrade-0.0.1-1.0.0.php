<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
	->newTable($installer->getTable('transactionalemailheaders/email_header'))
	->addColumn('header_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
      'identity'  => true,
      'unsigned'  => true,
      'nullable'  => false,
      'primary'   => true,
      ), 'Id')
	->addColumn('template_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
			'nullable'	=> false
		), 'Template Id')
  ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
      'nullable'  => false,
      ), 'Title')
  ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
      'nullable'  => false,
      ), 'Description');

$installer->getConnection()->createTable($table);

$installer->endSetup();

