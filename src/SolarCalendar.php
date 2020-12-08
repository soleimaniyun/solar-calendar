<?php


namespace App\Helpers;


class solarCalendar
{
    public function persian_date($gDate) {

        $split = explode('-' , $gDate );

        $gYear = (int)$split[0] ;
        $gMonth =  (int)$split[1] ;
        $gDay =  (int)$split[2] ;

        $pYear = 0;
        $pMonth = 0;
        $pDay = 0;

        $xLeapYear = (int) date('L', mktime(0,0,0, $gMonth, $gDay,$gYear - 1));
        $yLeapYear = (int) date('L', mktime(0,0,0, $gMonth, $gDay, $gYear));

        switch ($gMonth) {
            case 1 :
                $pYear = $gYear - 622;
                if ( $gDay < 21 - $xLeapYear ) { $pMonth = $gMonth + 9 ; } else { $pMonth = $gMonth + 10 ; } ;
                if ( $gDay >= 21 - $xLeapYear ) { $pDay = $gDay - ( 20 - $xLeapYear ) ; } else { $pDay = $gDay + 10 + $xLeapYear; } ;
                break;
            case 2 :
                $pYear = $gYear - 622;
                if ( $gDay < 20 - $xLeapYear ) { $pMonth = $gMonth + 9 ; } else { $pMonth = $gMonth + 10 ; } ;
                if ( $gDay >= 20 - $xLeapYear ) { $pDay = $gDay - ( 19 - $xLeapYear ) ; } else { $pDay = $gDay + 11 + $xLeapYear; } ;
                break;
            case 3 :
                if ($gDay < 21 - $yLeapYear) { $pYear = $gYear - 622; } else { $pYear = $gYear - 621 + $xLeapYear; };
                if ( $gDay < 21 - $yLeapYear ) { $pMonth = $gMonth + 9 ; } else { $pMonth = $gMonth - 2 ; } ;
                if ( $gDay >= 21 - $yLeapYear ) { $pDay = $gDay - ( 20 - $yLeapYear ) ; } else { $pDay = $gDay + 9 + $yLeapYear + $xLeapYear; } ;
                break;
            case 4 :
                $pYear = $gYear - 621;
                if ( $gDay >= 21 - $yLeapYear ) { $pMonth = $gMonth - 2 ; } else { $pMonth = $gMonth - 3 ; } ;
                if ( $gDay >= 21 - $yLeapYear ) { $pDay = $gDay - ( 20 - $yLeapYear ) ; } else { $pDay = $gDay + 11 + $yLeapYear; } ;
                break;
            case 5 :
            case 6 :
                $pYear = $gYear - 621;
                if ( $gDay >= 22 - $yLeapYear ) { $pMonth = $gMonth - 2 ; } else { $pMonth = $gMonth - 3 ; } ;
                if ( $gDay >= 22 - $yLeapYear ) { $pDay = $gDay - ( 21 - $yLeapYear ) ; } else { $pDay = $gDay + 10 + $yLeapYear; } ;
                break;
            case 7 :
            case 8 :
            case 9 :
                $pYear = $gYear - 621;
                if ( $gDay >= 23 - $yLeapYear ) { $pMonth = $gMonth - 2 ; } else { $pMonth = $gMonth - 3 ; } ;
                if ( $gDay >= 23 - $yLeapYear ) { $pDay = $gDay - ( 22 - $yLeapYear ) ; } else { $pDay = $gDay + 9 + $yLeapYear; } ;
                break;
            case 10 :
                $pYear = $gYear - 621;
                if ( $gDay >= 23 - $yLeapYear ) { $pMonth = $gMonth - 2 ; } else { $pMonth = $gMonth - 3 ; } ;
                if ( $gDay >= 23 - $yLeapYear ) { $pDay = $gDay - ( 22 - $yLeapYear ) ; } else { $pDay = $gDay + 8 + $yLeapYear; } ;
                break;
            case 11 :
            case 12 :
                $pYear = $gYear - 621;
                if ( $gDay >= 22 - $yLeapYear ) { $pMonth = $gMonth - 2 ; } else { $pMonth = $gMonth - 3 ; } ;
                if ( $gDay >= 22 - $yLeapYear ) { $pDay = $gDay - ( 21 - $yLeapYear ) ; } else { $pDay = $gDay + 9 + $yLeapYear; } ;
                break;
        }

        return $pYear . '/' . $pMonth . '/' . $pDay ;

    }

    public function Grigori_date($pDate)
    {
        $split = explode('/' , $pDate );

        $pYear = (int)$split[0] ;
        $pMonth =  (int)$split[1] ;
        $pDay =  (int)$split[2] ;

        $gYear = 0;
        $gMonth = 0;
        $gDay = 0;

        $y = 0;
        $d = 0;

        if ( $pYear <= 0 or $pMonth <= 0 or $pDay <= 0 or $pDay > 31 or $pMonth > 12 ) { return null ; } ;
        if ( $pMonth > 6 and $pDay > 30 ) { $pDay = 30 ; } ;

        $gYear = $pYear + 621 ;

        if ( ( (int) date('L', mktime(0,0,0, 1, 1, $gYear)) ) == 1 ) {
            $d = 10 ;
            $y = 1 ;
        } else {
            $d = 11 ;
            $y = 0 ;
        } ;

        switch ($pMonth) {
            case 1 :
                if ($pDay <= (11 + $y)) {
                    $gMonth = $pMonth + 2;
                    $gDay = $pDay + 20;
                } else {
                    $gMonth = $pMonth + 3;
                    $gDay = $pDay - 11;
                }
                break;
            case 2 :
            case 3 :
                if ($pDay <= (10 + $y)) {
                    $gMonth = $pMonth + 2;
                    if ($pMonth == 2) {
                        $gDay = $pDay + 20;
                    } else {
                        $gDay = $pDay + 21;
                    };
                } else {
                    $gMonth = $pMonth + 3;
                    $gDay = $pDay - 10;
                }
                break;
            case 4 :
            case 5 :
            case 6 :
            case 9 :
            case 8 :
                if ($pDay <= (9 + $y)) {
                    $gMonth = $pMonth + 2;
                    if ( $pMonth == 4 or $pMonth == 9 ) {
                        $gDay = $pDay + 21;
                    } else {
                        $gDay = $pDay + 22;
                    };
                } else {
                    $gMonth = $pMonth + 3;
                    $gDay = $pDay - 9;
                }
                break;
            case 7 :
                if ($pDay <= (8 + $y)) {
                    $gMonth = $pMonth + 2;
                    $gDay = $pDay + 22;
                } else {
                    $gMonth = $pMonth + 3;
                    $gDay = $pDay - 8;
                }
                break;
            case 10 :
                if ($pDay <= (10 + $y)) {
                    $gMonth = $pMonth + 2;
                    $gDay = $pDay + 21;
                } else {
                    $gMonth = $pMonth - 9;
                    $gDay = $pDay - 10;
                    $gYear = $gYear + 1;
                }
                break;
            case 11 :
                if ($pDay <= (11 + $y)) {
                    $gMonth = $pMonth - 10;
                    $gDay = $pDay + 20;
                    $gYear = $gYear + 1;
                } else {
                    $gMonth = $pMonth -9;
                    $gDay = $pDay - 11;
                    $gYear = $gYear + 1;
                }
                break;
            case 12 :
                if ($pDay <= (10 + $y)) {
                    $gMonth = $pMonth - 10;
                    $gDay = $pDay + 19;
                    $gYear = $gYear + 1;
                } else {
                    $gMonth = $pMonth -9;
                    $gDay = $pDay - 9;
                    $gYear = $gYear + 1;
                }
                break;
        }

        $gDay = $gDay - $y;

        return date('Y-m-d', mktime(0,0,0, $gMonth, $gDay,$gYear));
    }

}
