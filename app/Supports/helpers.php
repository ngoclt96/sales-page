<?php

function checkWeekend($string)
{
    $time = strtotime($string);
    $time = Date('N', $time);
    return ($time >= 6) ? true : false;
}

function dayName($string)
{
    $time = strtotime($string);
    return Date('l', $time);
}

function displayFormatDatetime($string, $format = null)
{
    $time = strtotime($string);
    return Date(($format) ? $format : \Config::get('constants.FORMAT_DATETIME_REPORT_DISPLAY') , $time);
}

function ckIsFutureDay($string){
    $time = strtotime($string);
    $now = new DateTime();
    return $time >= $now->getTimestamp();
}

function ckToday($string){
    $time = strtotime($string);
    $now = new DateTime(date('Y-m-d').' 00:00:00');
    return $time == $now->getTimestamp();
}

function checkTimeInReport($timeIn)
{
    $timeIn = new DateTime(filter_var($timeIn, FILTER_SANITIZE_NUMBER_INT));
    return ($timeIn > new DateTime(\Config::get('constants.TIME_IN'))) ? true : false;
}

function checkTimeOutReport($timeOut)
{
    $timeOut = new DateTime(filter_var($timeOut, FILTER_SANITIZE_NUMBER_INT));
    return ($timeOut < new DateTime(\Config::get('constants.TIME_OUT'))) ? true : false;
}

function createDateRangeArray($strDateFrom, $strDateTo, $sort = null)
{
    $aryRange = array();
    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

    if ($iDateTo >= $iDateFrom) {
        $aryRange[date(\Config::get('constants.FORMAT_DATETIME_REPORT'), $iDateFrom)]['time'] = date(\Config::get('constants.FORMAT_DATETIME_REPORT'), $iDateFrom);
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            $aryRange[date(\Config::get('constants.FORMAT_DATETIME_REPORT'), $iDateFrom)]['time'] = date(\Config::get('constants.FORMAT_DATETIME_REPORT'), $iDateFrom);
        }
    }
    if (is_null($sort)) $sort = 'desc';
    if ($sort == 'desc') {
        arsort($aryRange);
    }
    return $aryRange;
}

function timeToDate($time){
    return \Carbon\Carbon::createFromTimestamp($time);
}

function getLastDayOfMonth($month, $year) {
    if(is_null($month) || is_null($year)) $day = new DateTime();
    else $day = new DateTime($year.'-'.$month.'-01');
    return $day->modify('last day of');
}

function formatDate($value)
{
    if(!$value){
        return '';
    }
    if(is_string($value)){
        $value = date_create($value);
    }
    return $value->format(\App\Models\BaseModel::dateFormat());
}

function getCurrentCountry()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $details = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    if($details) {
        return $details;
    }
     return null;
}

/**
 * @param null $sortName
 * @return array|bool|string
 * @uses get current sort
 */
function getSort($sortName = null)
{
    $sorts = request()->query('sort');
    if (!$sorts)
    {
        return false;
    }
    $sortArr = explode(',', $sorts);
    if (! $sortArr) {
        return false;
    }

    $return = [];
    foreach ($sortArr as $sort)
    {
        $tmp = explode('-', $sort);
        $keySort = $tmp['0'];
        $valSort = isset($tmp['1']) ? $tmp['1'] : 'asc';
        $valSort = in_array($valSort, ['asc', 'desc']) ? $valSort : 'asc';
        if (!$sortName)
        {
            $return[$keySort] = $valSort;
        } else {
            if($keySort == $sortName) {
                return $valSort;
            }
        }
    }
    return $return;
}


function getCurrentRoute()
{
    return  $module = request()->segment(1);
}
