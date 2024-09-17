<?php

use App\Models\Task;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->longText('description');
            $table->date('end_date')->default('2025-09-10');
            //nincs kész: 0, készen van: 1
            $table->boolean('status')->default(0);
            //itt így fogják hívni a mezőt, ott hogy hívják, melyik táblával...
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('project_id')->references("id")->on("projects");
            $table->timestamps();
        });

        Task::create(['title' => 'Sith', 'description'=> 'The sith empires tale','user_id'=> 1, 'project_id'=> 1]);
        Task::create(['title' => 'Jedi', 'description'=> 'The jedis republics tale','user_id'=> 2, 'project_id'=> 1]);
        Task::create(['title' => 'Star wars', 'description'=> 'The star wars lore','user_id'=> 3, 'project_id'=> 1]);
        Task::create(['title' => 'Mando', 'description'=> 'The mandalorian lore','user_id'=> 4, 'project_id'=> 1]);
        Task::create(['title' => 'Forger', 'description'=> 'The tale of the mando forgers','user_id'=> 5, 'project_id'=> 1]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
