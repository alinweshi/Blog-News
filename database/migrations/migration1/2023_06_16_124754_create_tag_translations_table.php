<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_translation', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text("smalldesription")->nullable();
            $table->bigInteger("tag_id")->unsigned();
            $table->foreign("tag_id")->references("id")->on("tags")->cascadeOnDelete();
            $table->unique(["tag_id","locale"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_translation');
    }
};
