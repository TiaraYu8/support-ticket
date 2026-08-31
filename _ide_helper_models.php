<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\OrganizationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrganization {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $first_response_duration
 * @property string $resolution_duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketSla> $ticketSlas
 * @property-read int|null $ticket_slas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereFirstResponseDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereResolutionDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SlaPolicy whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
	#[\AllowDynamicProperties]
	class IdeHelperSlaPolicy {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $user_id
 * @property string|null $assigned_to_id
 * @property string $subject
 * @property string $description
 * @property \App\Enums\TicketStatus $status
 * @property \App\Enums\TicketPriorities $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $assignee
 * @property-read \App\Models\TicketSla|null $ticketSla
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereAssignedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUserId($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
	#[\AllowDynamicProperties]
	class IdeHelperTicket {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $ticket_id
 * @property int $sla_policy_id
 * @property \Carbon\CarbonImmutable|null $first_response_due_at
 * @property \Carbon\CarbonImmutable|null $first_responded_at
 * @property \Carbon\CarbonImmutable|null $resolution_due_at
 * @property \Carbon\CarbonImmutable|null $resolved_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SlaPolicy $slaPolicy
 * @property-read \App\Models\Ticket $ticket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereFirstRespondedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereFirstResponseDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereResolutionDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereResolvedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereSlaPolicyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketSla whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
	#[\AllowDynamicProperties]
	class IdeHelperTicketSla {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property int|null $organization_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $assignedTickets
 * @property-read int|null $assigned_tickets_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Organization|null $organization
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

