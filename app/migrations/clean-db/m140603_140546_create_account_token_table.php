<?php

class m140603_140546_create_account_token_table extends EDbMigration
{
    public function safeUp()
    {
        $this->createTable(
            'account_token',
            array(
                'id' => 'pk',
                'accountId' => 'int NOT NULL',
                'type' => 'string NOT NULL',
                'token' => 'string NOT NULL',
                'expiresAt' => 'datetime NOT NULL',
                'status' => "integer NOT NULL DEFAULT '0'",
                'UNIQUE KEY accountId_token (accountId, token)',
            )
        );
    }

    public function safeDown()
    {
        $this->dropTable('account_token');
    }
}