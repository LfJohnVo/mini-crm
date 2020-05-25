<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Companie
 * @package App\Models
 * @version May 25, 2020, 10:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property string $website
 */
class Companie extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'logo' => 'required',
        'website' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'company_id');
    }
}
