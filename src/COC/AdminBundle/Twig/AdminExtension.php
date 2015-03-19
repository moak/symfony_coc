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
            new \Twig_SimpleFilter('position', array($this, 'positionFilter')),
            new \Twig_SimpleFilter('division', array($this, 'divisionFilter')),
        );
    }

    public function divisionFilter($trophy)
    {
        switch ($trophy)
        {
            case $trophy > 400 && $trophy <= 499:
                $league = "Bronze 3";
                break;

            case $trophy >= 500 && $trophy <= 599:
                $league = "Bronze 2";
                break;

            case $trophy >= 600 && $trophy <= 799:
                $league = "Bronze 1";
                break;

            case $trophy >= 800 && $trophy <= 999:
                $league = "Silver 3";
                break;

            case $trophy >= 1000 && $trophy <= 1199:
                $league = "Silver 2";
                break;

            case $trophy >= 1200 && $trophy <= 1399:
                $league = '<img align="right" class="img-responsive" src="/symfony_coc/web/images/gold.png">';
                break;

            case $trophy >= 1400 && $trophy <= 1599:
                $league = "Gold 3";
                break;

            case $trophy >= 1600 && $trophy <= 1799:
                $league = "Gold 2";
                break;

            case $trophy >= 1800 && $trophy <= 1999:
                $league = "Gold 1";
                break;

            case $trophy >= 2000 && $trophy <= 2199:
                $league = "Crystal 3";
                break;

            case $trophy >= 2200 && $trophy <= 2399:
                $league = "Crystal 2";
                break;

            case $trophy >= 2400 && $trophy <= 2599:
                $league = "Crystal 1";
                break;

            case $trophy >= 2600 && $trophy <= 2799:
                $league = "Master 3";
                break;

            case $trophy >= 2800 && $trophy <= 2999:
                $league = "Master 2";
                break;

            case $trophy >= 3000 && $trophy <= 3199:
                $league = "Master 1";
                break;

            case $trophy > 3200:
                $league = "Champion";
                break;

            default:
                $league = "bronze 3";
        }
        return $league;
    }


    public function positionFilter($number)
    {
        if ( $number == 1)
        {
            return "rst";
        }
        elseif ( $number == 2)
        {
            return "nd";
        }
        else{
            return "th";
        }
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