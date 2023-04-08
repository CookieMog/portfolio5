<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

class AddColumnsToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new columns to the tags table
        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug');
            $table->text('description');
        });

        // Insert default values into the tags table
        Tag::create(['name' => 'Javascript', 'slug' => 'javascript', 'description' => 'A programming language for creating interactive web pages']);
        Tag::create(['name' => 'PHP', 'slug' => 'php', 'description' => 'A server-side scripting language for web development']);
        Tag::create(['name' => 'HTML', 'slug' => 'html', 'description' => 'A markup language for creating web pages']);
        Tag::create(['name' => 'CSS', 'slug' => 'css', 'description' => 'A stylesheet language for styling web pages']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove the columns from the tags table
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description']);
        });
    }
}
