<?php

namespace App\Http\Helpers;

class DateCalculation
{

    public function workingKays($date1, $date2, $holidays)
    {
        $difdays = 0;

        /*
         *
         *
         *source :
         https://stackoverflow.com/questions/12365461/day-difference-without-weekends */
        //$holidays  is an array like : $holidays = array('2012-09-07');
        // $start = new DateTime('2012-09-06');
        $start = new DateTime($date1);

        //   $end = new DateTime('2012-09-11');
        $end = new DateTime($date2);
        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');

        $interval = $end->diff($start);

        // total days
        $days = $interval->days;

        // create an iterateable period of date (P1D equates to 1 day)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

        // best stored as array, so you can add more than one
        //$holidays = array('2012-09-07');

        foreach ($period as $dt) {
            $curr = $dt->format('D');

            // substract if Saturday or Sunday
            if ($curr == 'Sat' || $curr == 'Sun') {
                $days--;
            } // (optional) for the updated question
            elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                $days--;
            }
        }


        echo $days ;

        return $days;
    }
}