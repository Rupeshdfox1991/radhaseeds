<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_cat_id');
            $table->integer('pro_filt_cat_id');
            $table->integer('pro_filt_id');
            $table->integer('pro_series_id');
            $table->string('related_product_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('image');
            $table->string('alt_tag')->nullable();
            $table->string('title_tag')->nullable();
            $table->string('product_code')->nullable();
            $table->text('product_desc')->nullable();
            $table->string('moc')->nullable();
            $table->string('ofc')->nullable();
            $table->string('weight')->nullable();
            $table->string('design_reg_no')->nullable();
            $table->string('shape')->nullable();
            $table->string('color')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('page_schema')->nullable();
            $table->text('og_code')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('product_models');
    }
}