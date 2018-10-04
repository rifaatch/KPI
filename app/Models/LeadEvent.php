<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadEvent extends Model
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
    protected $table = 'lead_events';

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
                  'lead_id',
                  'zoho_id',
                  'employ_id',
                  'owner_id',
                  'event_name',
                  'action_id'

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
     * Get the lead for this model.
     */
    public function lead()
    {
        return $this->belongsTo('App\Models\Lead','lead_id','id');
    }



    /**
     * Get the employee for this model.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','owner_id','id');
    }




}
