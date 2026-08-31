<?php

use App\Enums\RolesEnum;
use App\Enums\TicketPriorities;
use App\Enums\TicketStatus;
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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default(RolesEnum::CLIENT->value);
            $table->foreignId('organization_id')->nullable()->constrained('organizations');
        });

        Schema::create('sla_policies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_response_duration');
            $table->string('resolution_duration');
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained('users');
            $table->foreignUlid('assigned_to_id')->nullable()->constrained('users');
            $table->string('subject');
            $table->text('description');
            $table->string('status')->default(TicketStatus::OPEN->value);
            $table->string('priority')->default(TicketPriorities::NORMAL->value);
            $table->timestamps();
        });

        Schema::create('ticket_slas', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('ticket_id')->constrained('tickets');
            $table->foreignId('sla_policy_id')->constrained('sla_policies');
            $table->dateTime('first_response_due_at')->nullable();
            $table->dateTime('first_responded_at')->nullable();
            $table->dateTime('resolution_due_at')->nullable();
            $table->dateTime('resolved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_slas');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('sla_policies');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn(['role', 'organization_id']);
        });

        Schema::dropIfExists('organizations');
    }
};
