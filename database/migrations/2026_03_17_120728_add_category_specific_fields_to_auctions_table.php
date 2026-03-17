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
        Schema::table('auctions', function (Blueprint $table) {
            // Category
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();

            // Car / Truck
            $table->string('make')->nullable();
            $table->string('make_ar')->nullable();
            $table->string('model')->nullable();
            $table->string('model_ar')->nullable();
            $table->year('year')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('vin', 50)->nullable();
            $table->string('title_status')->nullable();
            $table->string('engine')->nullable();
            $table->string('drivetrain')->nullable();
            $table->string('transmission')->nullable();
            $table->string('body_style')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('owner_count')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_type')->nullable();
            $table->text('highlights')->nullable();
            $table->text('seller_notes')->nullable();
            $table->text('other_items')->nullable();

            // Real Estate
            $table->string('property_type')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->float('bathrooms')->nullable();
            $table->integer('sqft')->nullable();
            $table->string('lot_size')->nullable();
            $table->year('year_built')->nullable();
            $table->integer('garage')->nullable();
            $table->text('re_features')->nullable();

            // Antiques
            $table->string('era')->nullable();
            $table->string('material')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('condition')->nullable();
            $table->string('provenance')->nullable();
            $table->string('artist')->nullable();
            $table->text('antique_notes')->nullable();

            // Animals
            $table->string('species')->nullable();
            $table->string('breed')->nullable();
            $table->string('animal_age')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->string('health_records')->nullable();
            $table->text('animal_info')->nullable();

            // Fruits & Vegetables
            $table->string('produce_type')->nullable();
            $table->string('variety')->nullable();
            $table->string('quantity')->nullable();
            $table->date('harvest_date')->nullable();
            $table->string('grade')->nullable();
            $table->text('produce_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auctions', function (Blueprint $table) {
            $table->dropColumn([
                'category_id',
                'make',
                'make_ar',
                'model',
                'model_ar',
                'year',
                'mileage',
                'vin',
                'title_status',
                'engine',
                'drivetrain',
                'transmission',
                'body_style',
                'exterior_color',
                'interior_color',
                'owner_count',
                'seller_name',
                'seller_type',
                'highlights',
                'seller_notes',
                'other_items',
                'property_type',
                'bedrooms',
                'bathrooms',
                'sqft',
                'lot_size',
                'year_built',
                'garage',
                're_features',
                'era',
                'material',
                'dimensions',
                'condition',
                'provenance',
                'artist',
                'antique_notes',
                'species',
                'breed',
                'animal_age',
                'gender',
                'weight',
                'health_records',
                'animal_info',
                'produce_type',
                'variety',
                'quantity',
                'harvest_date',
                'grade',
                'produce_notes',
            ]);
        });
    }
};
