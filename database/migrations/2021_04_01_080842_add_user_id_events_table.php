<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // create foreign key constraints
            // $table->foreignId('user_id')
            // ->after('date')
            // ->constrained('users')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id')->after('date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // // drop foreign key constraints
            // $table->dropForeign('events_user_id_foreign');
            
            // //drop new column
            // $table->dropColumn('user_id');
            
            //drop new column
            $table->dropColumn('user_id');

        });
    }
}
