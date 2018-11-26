<?php



use Carbon\Carbon;

 function duration ($date)
{

    $created = new Carbon($date);
    $now = Carbon::now();
    $difference = ($created->diff($now)->days < 1)
        ? 'today'
        : $created->diffForHumans($now);
    return $difference;

}



