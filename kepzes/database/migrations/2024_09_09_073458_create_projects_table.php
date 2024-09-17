<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('costs');
            $table->integer('time');
            $table->foreignId('manager_id')->references("id")->on("users");
            $table->timestamps();
        });

        Project::create(['name' => 'Gangsztas', 'costs'=> 10000,'time'=> 60, 'manager_id'=> 1]);
        Project::create(['name' => 'Very nice project', 'costs'=> 250000,'time'=> 30, 'manager_id'=> 2]);
        Project::create(['name' => 'Even nicer project', 'costs'=> 30000,'time'=> 45, 'manager_id'=> 3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
