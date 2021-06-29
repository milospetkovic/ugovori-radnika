<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Http\Model\Entity{
/**
 * App\Http\Model\Entity\AndroidToken
 *
 * @property int $id
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AndroidToken whereUpdatedAt($value)
 */
	class AndroidToken extends \Eloquent {}
}

namespace App\Http\Model\Entity{
/**
 * App\Http\Model\Entity\Company
 *
 * @property Worker[] $workers
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property boolean $inactive
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereInactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Http\Model\Entity{
/**
 * App\Http\Model\Entity\Worker
 *
 * @property Company $company
 * @property int $id
 * @property int $fk_company
 * @property string $created_at
 * @property string $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $description
 * @property boolean $inactive
 * @property string $contract_start Date when contract for worker has started
 * @property string $contract_end Date when contract ends for worker
 * @property string|null $jmbg JMBG of a worker
 * @property string|null $active_until_date Date until worker should be marked as active
 * @property int $send_contract_ended_notification If flag is active then cron will not notify android users that contract is ended for the worker
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereActiveUntilDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereContractEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereContractStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereFkCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereInactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereJmbg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereSendContractEndedNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereUpdatedAt($value)
 */
	class Worker extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id Primary key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name Name of a company
 * @property string|null $description Note about company...
 * @property int|null $inactive If other than null than the company is inactive
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereInactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Worker
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker query()
 */
	class Worker extends \Eloquent {}
}

