<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

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
                  'zoho_id',
                  'status',
                  'client_name',
                  'description',
                  'action',
                  'source',
                  'employee_id'
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
     * Get the employee for this model.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }

    /**
     * Get the applicationEvent for this model.
     */
    public function applicationEvent()
    {
        return $this->hasMany('App\Models\ApplicationEvent','aplication_id','id');
    }




}
