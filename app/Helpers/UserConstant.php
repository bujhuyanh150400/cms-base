<?php

namespace App\Helpers;

class UserConstant
{
    const ADMIN = 10;
    const LEADER = 15;
    const EMPLOYEE = 20;

    const MANAGERMENT  = 9;

    const MEDICAL_EXAMINATION = 19;
    static public function getListPosition(){

        return [
            self::ADMIN => [
                'value' =>self::ADMIN,
                'text'=> 'Admin',
            ],
            self::LEADER => [
                'value' =>self::LEADER,
                'text'=> 'Leader',
            ],
            self::EMPLOYEE => [
                'value' =>self::EMPLOYEE,
                'text'=> 'Nhân viên',
            ],
        ];
    }
    static public function getListDepartment(){
        return [
            self::MANAGERMENT => [
                'value' =>self::MANAGERMENT,
                'text'=> 'Phòng quản lý',
            ],
            self::MEDICAL_EXAMINATION => [
                'value' =>self::MEDICAL_EXAMINATION,
                'text'=> 'Phòng khám bệnh',
            ],
        ];
    }
}
