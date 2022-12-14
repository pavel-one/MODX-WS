<?php
namespace MODX\Revolution\mysql;

use xPDO\xPDO;

class modUserGroupSetting extends \MODX\Revolution\modUserGroupSetting
{

    public static $metaMap = array (
        'package' => 'MODX\\Revolution\\',
        'version' => '3.0',
        'table' => 'user_group_settings',
        'extends' => 'xPDO\\Om\\xPDOObject',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
            'group' => 0,
            'key' => NULL,
            'value' => NULL,
            'xtype' => 'textfield',
            'namespace' => 'core',
            'area' => '',
            'editedon' => NULL,
        ),
        'fieldMeta' => 
        array (
            'group' => 
            array (
                'dbtype' => 'integer',
                'attributes' => 'unsigned',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
                'index' => 'pk',
            ),
            'key' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '50',
                'phptype' => 'string',
                'null' => false,
                'index' => 'pk',
            ),
            'value' => 
            array (
                'dbtype' => 'text',
                'phptype' => 'string',
            ),
            'xtype' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '75',
                'phptype' => 'string',
                'null' => false,
                'default' => 'textfield',
            ),
            'namespace' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '40',
                'phptype' => 'string',
                'null' => false,
                'default' => 'core',
            ),
            'area' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '255',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'editedon' => 
            array (
                'dbtype' => 'timestamp',
                'phptype' => 'timestamp',
                'null' => true,
                'default' => NULL,
                'attributes' => 'ON UPDATE CURRENT_TIMESTAMP',
            ),
        ),
        'indexes' => 
        array (
            'PRIMARY' => 
            array (
                'alias' => 'PRIMARY',
                'primary' => true,
                'unique' => true,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'group' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                    'key' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
        ),
        'aggregates' => 
        array (
            'UserGroup' => 
            array (
                'class' => 'MODX\\Revolution\\modUserGroup',
                'local' => 'group',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
            'Namespace' => 
            array (
                'class' => 'MODX\\Revolution\\modNamespace',
                'local' => 'namespace',
                'foreign' => 'name',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
    );

    public static function listSettings(
        xPDO &$xpdo,
        array $criteria = [],
        array $sort = ['id' => 'ASC'],
        $limit = 0,
        $offset = 0
    ) {
        $c = $xpdo->newQuery(\MODX\Revolution\modUserGroupSetting::class);
        $c->select([
            $xpdo->getSelectColumns(\MODX\Revolution\modUserGroupSetting::class, 'modUserGroupSetting'),
            'Entry.value AS name_trans',
            'Description.value AS description_trans',
        ]);
        $c->leftJoin(\MODX\Revolution\modLexiconEntry::class, 'Entry', "CONCAT('setting_',modUserGroupSetting.`key`) = Entry.name");
        $c->leftJoin(\MODX\Revolution\modLexiconEntry::class, 'Description', "CONCAT('setting_',modUserGroupSetting.`key`,'_desc') = Description.name");
        $c->where($criteria);
        $count = $xpdo->getCount(\MODX\Revolution\modUserGroupSetting::class, $c);
        $c->sortby($xpdo->getSelectColumns(\MODX\Revolution\modUserGroupSetting::class, 'modUserGroupSetting', '', ['area']), 'ASC');
        foreach ($sort as $field => $dir) {
            $c->sortby($xpdo->getSelectColumns(\MODX\Revolution\modUserGroupSetting::class, 'modUserGroupSetting', '', [$field]), $dir);
        }
        if ((int)$limit > 0) {
            $c->limit((int)$limit, (int)$offset);
        }

        return [
            'count' => $count,
            'collection' => $xpdo->getCollection(\MODX\Revolution\modUserGroupSetting::class, $c),
        ];
    }
}
