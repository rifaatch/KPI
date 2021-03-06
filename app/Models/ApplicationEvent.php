<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationEvent extends Model
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
    protected $table = 'application_events';

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
        'zoho_id', // it is the application zoho id
        'action_id', // it is the event / action zoho id
        'application_id',
        'employee_id',
        'old_employee_id',
        'admission_id',
        'counselor_id',
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
     * Get the application for this model.
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id', 'id');
    }

    /**
     * Get the employee for this model.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }


}
