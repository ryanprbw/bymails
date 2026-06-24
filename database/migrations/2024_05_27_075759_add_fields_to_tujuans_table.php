<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tujuans', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('province_id');
            // $table->string('name');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tujuans', function (Blueprint $table) {
            // $table->dropColumn('id');
            $table->dropColumn('province_id');
            // $table->dropColumn('name');
            // $table->dropTimestamps();
        });
    }
}
