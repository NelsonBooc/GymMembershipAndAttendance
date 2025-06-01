<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable();
            }
            if (!Schema::hasColumn('users', 'emergency_contact')) {
                $table->string('emergency_contact')->nullable();
            }
            if (!Schema::hasColumn('users', 'membership_plan')) {
                $table->string('membership_plan')->nullable();
            }
            if (!Schema::hasColumn('users', 'trainer')) {
                $table->string('trainer')->nullable();
            }
            if (!Schema::hasColumn('users', 'expiration')) {
                $table->timestamp('expiration')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'emergency_contact')) {
                $table->dropColumn('emergency_contact');
            }
            if (Schema::hasColumn('users', 'membership_plan')) {
                $table->dropColumn('membership_plan');
            }
            if (Schema::hasColumn('users', 'trainer')) {
                $table->dropColumn('trainer');
            }
            if (Schema::hasColumn('users', 'expiration')) {
                $table->dropColumn('expiration');
            }
        });
    }
}
