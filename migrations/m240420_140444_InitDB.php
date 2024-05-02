<?php

use yii\db\Migration;


class m240420_140444_InitDB extends Migration
{

    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'password' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull()->unique(),
            'birthday' => $this->date()
        ]);
        $this->createTable('sale_card', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'number' => $this->string()->notNull(),
            'balance' => $this->integer()->notNull()->defaultValue(0),
            'date' => $this->date()
        ]);
        $this->addForeignKey(
            'sale_to_user_fk',
            'sale_card',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('menu', [
           'id' => $this->primaryKey(),
           'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'compound' => $this->text(),
            'price' => $this->integer()->notNull(),
            'volume' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull()
        ]);
        $this->createTable('categories', [
            'id' => $this->primaryKey() ,
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
        $this->addForeignKey(
            'menu_to_category_fk',
            'menu',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('reserves', [
           'id' => $this->primaryKey(),
           'user_id' => $this->integer()->notNull(),
           'order_id' => $this->integer(),
            'table' => $this->string()->notNull(),
            'time_start' => $this->time(),
            'time_end' => $this->time()
        ]);
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_menu_id' => $this->integer(),
            'finally_price' => $this->integer()
        ]);
        $this->addForeignKey(
            'reserve_to_user_fk',
            'reserves',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'reserve_to_order_fk',
            'reserves',
            'order_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('order_menu',[
           'id' => $this->primaryKey(),
           'menu_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'order_to_order_menu_fk',
            'orders',
            'order_menu_id',
            'order_menu',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }



    public function safeDown()
    {
        $this->dropTable('order_menu');
        $this->dropTable('orders');
        $this->dropTable('reserves');
        $this->dropTable('categories');
        $this->dropTable('menu');
        $this->dropTable('sale_card');
        $this->dropTable('users');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240420_140444_InitDB cannot be reverted.\n";

        return false;
    }
    */
}
