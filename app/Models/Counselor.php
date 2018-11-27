<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'counselors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'zoho_id',
                  'office_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    

    /**
     * Get the office for this model.
     */
    public function office()
    {
        return $this->belongsTo('App\Models\Office','office_id','id');
    }

    public function leads()
    {
        return $this->hasMany('App\Models\Lead', 'employee_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application', 'employee_id', 'id');
    }



    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'employee_id', 'id');
    }




}
