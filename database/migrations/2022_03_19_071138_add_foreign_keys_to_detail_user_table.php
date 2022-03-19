<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_user', function (Blueprint $table) {
                //memberikan foreign key di detailuser "user_id" dari users
                $table->foreign('user_id','fk_detail_user_to_users')
                ->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                 //memberikan foreign key di detailuser "type_user_id" dari type_user
                $table->foreign('type_user_id','fk_detail_user_to_type_user')
                ->references('id')->on('type_user')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_user', function (Blueprint $table) {
            $table->dropForeign('fk_detail_user_to_users');
            $table->dropForeign('fk_detail_user_to_type_user');
        });
    }
}
