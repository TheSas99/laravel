<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTableWithPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tags'))
        {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('news_item_tag'))
        {
            Schema::create('news_item_tag', function (Blueprint $table) {
                // FK news_item_id
                $table->unsignedBigInteger('news_item_id');
                // FK tag_id
                $table->unsignedBigInteger('tag_id');

                //Primary
                $table->primary(['news_item_id', 'tag_id']);

                $table->foreign('news_item_id')->references('id')->on('news_items')->onDelete('cascade');
                $table->foreign('tag_id')->references('id')->on('tags');

                $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_item_tag');
        Schema::dropIfExists('tags');
    }
}
