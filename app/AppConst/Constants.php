<?php
/**
 * All constant application defined here
 */
namespace App\AppConst;
class Constants{
    const VIEW_DIR = 'pc';
    const USER_TYPE_ROOT = 1;
    const USER_TYPE_ADMIN = 2;
    const USER_TYPE_EMPLOYEE = 3;
    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;
    /** Department type */
    const DP_TYPE_SCHOOL = 1;
    const DP_TYP_NORMAL = 2;
    /** Student study type */
    const STUDING = 1;
    const IN_SCHOOL = 2;
    const OUT_SCHOOL = 3;
    const USER_TYPE = [
        self::USER_TYPE_ROOT => 'root',
        self::USER_TYPE_ADMIN => 'admin',
        self::USER_TYPE_EMPLOYEE => 'employee'
    ] ;
    const ACC_TYPE = [
        self::USER_TYPE_ADMIN => 'admin',
        self::USER_TYPE_EMPLOYEE => 'employee'
    ] ;
    const PAGE_RECORD = 20;
    const STUDY_STATUS = [
        self::STUDING => 'Studing',
        self::IN_SCHOOL => 'In school',
        self::OUT_SCHOOL => 'Out school'
    ];
    const STATUS = [
        self::STATUS_ACTIVE => 'active',
        self::STATUS_INACTIVE => 'inactive'
    ];
    const ORG_TYPE = [
        self::DP_TYPE_SCHOOL => 'school',
        self::DP_TYP_NORMAL => 'normal'
    ];
    const WORKTIME_TYPE = [
        1 => 'Part time',
        2 => 'Full time'
    ];
    const SEX = [
        1 => 'Male',
        2 => 'Female'
    ];
    const JP_DATE_FORMAT = 'Y年m月d日';
    const DATE_FORMAT = 'Y-m-d';
}