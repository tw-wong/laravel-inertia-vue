<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDateTimeAddDateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //drop column
            $table->dropColumn('date_time');
            
            //add new column
            $table->date('date')->after('description');
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
            //drop new column
            $table->dropColumn('date');
            
            //restore existing column
            $table->dateTime('date_time', 0);
        });
    }
}
