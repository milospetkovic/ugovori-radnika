<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 19.1.19.
 * Time: 20.06
 */

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;

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
 * @mixin \Eloquent
 */
class Worker extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'worker';

    public static $tbl_name = 'worker';

    /**
     * @var array
     */
    protected $fillable = ['fk_company', 'created_at', 'updated_at', 'first_name', 'last_name', 'contract_start', 'contract_end', 'jmbg', 'description', 'inactive', 'active_until_date', 'send_contract_ended_notification'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Model\Entity\Company', 'fk_company');
    }
}