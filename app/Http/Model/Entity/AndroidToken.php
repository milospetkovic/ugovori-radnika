<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class AndroidToken extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'android_token';

    public static $tbl_name = 'android_token';

    /**
     * @var array
     */
    protected $fillable = ['token', 'created_at', 'updated_at'];

}
