<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

$user = User::create([
    'name'=> 'monsef',
    'email' => 'xr.monsef@gmail.com',
    'email_verified_at' =>now(),
    'password'=> Hash::make('monsef123'),
]);
$user = User::create([
    'name'=> 'admin',
    'email' => 'admin@gmail.com',
    'email_verified_at' =>now(),
    'password'=> Hash::make('admin123'),
    'is_admin' => 1,
]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
