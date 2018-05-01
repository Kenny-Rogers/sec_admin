<?php 
    //functions for secretariat info
    function get_type($value = ""){
        $detail = "";
        switch ($value) {
            case 'reg_hqr':
                $detail = "Regional Headquaters";
            break;

            case 'dist_cm':
                $detail = "District Command";
            break;
 
            case 'div_cm':
                $detail = "Divisional Command";
            break;

            case 'pol_pst':
                $detail = "Police Post";
            break;
            default:
                $detail = "";
                break;
        }

        return $detail;
    }


    function get_region($value = ""){
        $detail = "";
        switch ($value) {
            case 'gr':
                $detail = "Greater Accra";
                break;
            
            case 'cr':
                $detail = "Central";
                break;

            case 'wr':
                $detail = "Western";
                break;

            case 'er':
                $detail = "Eastern";
                break;

            case 'nr':
                $detail = "Northern";
                break;

            default:
                $detail = "";
                break;
        }
        return $detail;
    }

    function datetime_to_text($datetime=""){
    //displays the date in a different format
    $unixdatetime = strtotime($datetime);
    return Strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
    }

    function get_displayable_date($date_string=""){
        //gives time from a given string
        $unix_time = strftime('%d %B, %Y', strtotime($date_string));
        return $unix_time;
    }

    //makes a date acceptable to mysql database
    function mysql_date_format($dt=""){
    $mysql_date=strftime("%Y-%m-%d", $dt);
    return  $mysql_date;
    }


    function output_message($message = "", $class = "", $message_return = ''){
        //displays a paragraphed text
        if (!empty($message) && $class == "success") {
            $message_display = "<div class='row'><div class='col-sm-offset-1 col-sm-10 alert alert-success alert-dismissable'>" .
                "<a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>{$message}</div></div>";
        } elseif (!empty($message) && $class == "fail") {
            $message_display = "<div class='row'><div class='col-sm-offset-1 col-sm-10 alert alert-danger alert-dismissable'>" .
                "<a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>{$message}</div></div>";
        } elseif (!empty($message) && $class == "info") {
            $message_display = "<div class='row'><div class='col-sm-offset-1 col-sm-10 alert alert-info alert-dismissable'>" .
                "<a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>{$message}</div></div>";
        } else {
            $message_display = "";
        }

        if ($message_return == 'r') {
            return $message_display;
        } else {
            echo $message_display;
        }
    }
?>