<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
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
