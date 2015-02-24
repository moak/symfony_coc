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
                $result = "En attente de résultat";
                break;
            case "1":
                $result = "Defaite";
                break;
            case "2":
                $result = "Victoire";
                break;
            default:
                $result = "En attente de résultat";
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
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one min ago";
            }
            else{
                return "$minutes min ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yest";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }


    }



    public function getName()
    {
     return 'admin_extension';
    }
}