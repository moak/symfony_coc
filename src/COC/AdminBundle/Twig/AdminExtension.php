<?php

namespace COC\AdminBundle\Twig;

class AdminExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('result', array($this, 'resultFilter')),
            new \Twig_SimpleFilter('timeago', array($this, 'timeagoFilter')),
            new \Twig_SimpleFilter('boolean', array($this, 'booleanFilter')),
        );
    }

    public function booleanFilter($boolean)
    {
        if ( $boolean == 1)
        {
            return "Oui";
        }
        else
        {
            return "Non";
        }
    }
    public function resultFilter($number)
    {
        switch ($number)
        {
            case "0":
                $result = "-";
                break;
            case "1":
                $result = "Defeat";
                break;
            case "2":
                $result = "Victory";
                break;
            default:
                $result = "--";
        }
        return $result;
    }

    public function timeagoFilter($date)
    {
        $time_ago = $date;
        $cur_time   = time();

        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return  "1 min";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "1 min";
            }
            else{
                return "$minutes m";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "1 hour";
            }else{
                return "$hours hrs";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yest";
            }else{
                return "$days days";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week";
            }else{
                return "$weeks weeks";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month";
            }else{
                return "$months months";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year";
            }else{
                return "$years years";
            }
        }


    }



    public function getName()
    {
     return 'admin_extension';
    }
}