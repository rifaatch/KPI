<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
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
    protected $table = 'offices';

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
        'office_name'
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
        return $this->hasMany('App\Models\Employee', 'office_id', 'id');
    }

    public function leads()
    {

        return $this->hasManyThrough('App\Models\Lead', 'App\Models\Employee');
    }


// this event for leads .
    public function events()
    {

        return $this->hasManyThrough('App\Models\LeadEvent', 'App\Models\Employee');

    }

    public function applications()
    {
        return $this->hasManyThrough('App\Models\Application', 'App\Models\Employee');

    }

    public function applicationEvents()
    {
        return $this->hasManyThrough('App\Models\ApplicationEvent', 'App\Models\Employee');
    }

    public function contacts()
    {
        return $this->hasManyThrough('App\Models\Contact', 'App\Models\Employee');
    }

    public function contactsEvents()
    {
        return $this->hasManyThrough('App\Models\ContactEvent', 'App\Models\Employee');
    }

    public function kpiIndicators()
    {

        return $this->hasManyThrough('App\Models\KpiIndicator', 'App\Models\Employee');

    }


}
