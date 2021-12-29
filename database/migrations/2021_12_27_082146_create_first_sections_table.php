<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_sections', function (Blueprint $table) {
            $table->id();
            $table->string('first_icon');
            $table->text('first_title');
            $table->text('first_dec');
            $table->string('secand_icon');
            $table->text('secand_title');
            $table->text('secand_dec');
            $table->string('third_icon');
            $table->text('third_title');
            $table->text('third_dec');
            $table->string('fourth_icon');
            $table->text('fourth_title');
            $table->text('fourth_dec');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('first_sections');
    }
}
