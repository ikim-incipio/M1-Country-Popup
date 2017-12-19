<?php
/** Country Popup DB Setup
 * Author: Isaac Kim
 * Date: 12-15-2017
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
	->newTable($installer->getTable('incase_countrypopup/country'))
	->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'	=> true,
		'unsigned'	=> true,
		'nullable'	=> false,
		'primary'	=> true,
		), 'Id')
	->addColumn('code', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'	=> false,
		), 'Code')
	->addColumn('country', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'	=> false,
		), 'Country')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'	=> false,
		), 'Description')
	->addColumn('url', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'	=> false,
		), 'Url')
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		'default'	=> Varien_Db_Ddl_Table::TIMESTAMP_INIT,
		'nullable'	=> false,
		), 'Created At');
$installer->getConnection()->createTable($table);

$installer->endSetup();