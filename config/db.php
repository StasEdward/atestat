<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ateglobal',
    'username' => 'root',
    'password' => 'edstas12',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    // Duration of schema cache.
            'schemaCacheDuration' => 3600,

            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
/*      'class' => 'edgardmessias\db\firebird\Connection',
    'dsn' => 'firebird:dbname=phosphorus3:d:\home\administrator\local_dbs\ATEGLOBAL;charset=ISO8859_1',
    'username' => 'SYSDBA',
    'password' => 'masterkey',*/
];
