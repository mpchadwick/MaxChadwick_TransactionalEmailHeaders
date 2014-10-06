<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn('core_email_template', 'template_mailgun_campaign', 'varchar(200)');
$installer->endSetup();