<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;

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
 * @mixin \Eloquent
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
