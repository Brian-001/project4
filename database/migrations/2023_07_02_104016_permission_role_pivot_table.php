<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * foreignId creates a foreign Key column that has unsigned bigInt
     * role_id is defined to reference id column on roles table using references()
     * permission_id is defined to reference id column on permissions table using references()
     * cascadeOnDelete sets the cascading behaviour, so when a role is deleted, the associated
     * permission-role record will be deleted 
     *
    */
    public function up(): void
    {
        Schema::create('permission_role', function(Blueprint $table){

            $table->foreignId('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreignId('permission_id')->references('id')->on('permissions')->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('permission_role');
    }
};
