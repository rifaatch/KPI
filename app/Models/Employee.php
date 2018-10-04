<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
    protected $table = 'employees';

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
                  'office_id',
                  'created_at'
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

    /**
     * Get the leadEvent for this model.
     */
    public function leadEvent()
    {
        return $this-> hasMany('App\Models\LeadEvent','owner_id','id');
    }

    /**
     * Get the lead for this model.
     */
    public function lead()
    {
        return $this->hasMany('App\Models\Lead','employ_id','id');
    }




}
