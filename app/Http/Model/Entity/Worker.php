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
 * @property Company $company
 * @property int $id
 * @property int $fk_company
 * @property string $created_at
 * @property string $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $description
 * @property boolean $inactive
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