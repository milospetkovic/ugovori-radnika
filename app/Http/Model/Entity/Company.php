<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @property Worker[] $workers
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property boolean $inactive
 */
class Company extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company';

    public static $tbl_name = 'company';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name', 'description', 'inactive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany('App\Model\Entity\Worker', 'fk_company');
    }
}
