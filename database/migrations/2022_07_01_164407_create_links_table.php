<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('url');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('linkables', function (Blueprint $table) {
            $table->foreignId('link_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->morphs('linkable');
            $table->index(['linkable_id', 'linkable_type']);
            $table->unique(['link_id', 'linkable_id', 'linkable_type'], 'linkables_ids_type_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
