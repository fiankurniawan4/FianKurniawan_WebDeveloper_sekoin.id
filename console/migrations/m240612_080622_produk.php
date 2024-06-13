<?php

use yii\db\Migration;

/**
 * Class m240612_080622_produk
 */
class m240612_080622_produk extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%produk}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull()->unique(),
            'deskripsi' => $this->text()->notNull(),
            'gambar' => $this->string()->null(),
            'harga' => $this->string()->notNull(),
            'stok' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%admin}}');
    }
}
