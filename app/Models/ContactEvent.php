<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEvent extends Model
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
    protected $table = 'contact_events';

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
                  'action_id',
                  'contact_id',
                  'employee_id',
                  'old_employee_id',
                  'action_name',
                  'description'
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
     * Get the contact for this model.
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact','contact_id','id');
    }

    /**
     * Get the employee for this model.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }

    /**
     * Get the oldEmployee for this model.
     */
    public function oldEmployee()
    {
        return $this->belongsTo('App\Models\Employee','old_employee_id');
    }




}
