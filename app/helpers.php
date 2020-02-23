<?php
if (!function_exists('mergeDataCompanyBenefit')) {
    function mergeDataCompanyBenefit($dataCompanyBenefits, $companyId)
    {
        foreach ($dataCompanyBenefits as $key => $dataCompanyBenefit) {
            $dataCompanyBenefits[$key]['company_id'] = $companyId;
            $dataCompanyBenefits[$key]['created_at'] = date('Y-m-d H:i:s');
            $dataCompanyBenefits[$key]['updated_at'] = date('Y-m-d H:i:s');
        }
        return $dataCompanyBenefits;
    }
}
if (!function_exists('mergeDataContact')) {
    function mergeDataContact($Contacts, $jobId)
    {
        foreach ($Contacts as $key => $arrContact) {
            $Contacts[$key]['job_id'] = $jobId;
            $Contacts[$key]['created_at'] = date('Y-m-d H:i:s');
            $Contacts[$key]['updated_at'] = date('Y-m-d H:i:s');

        }
        return $Contacts;
    }
}

if (!function_exists('getGroupSales')) {
    function getGroupSales()
    {
        return [
            1 => 'Sale Admin',
            2 => 'Telesale',
            3 => 'Sale tư vấn',
            4 => 'Sale thị trường',
            5 => 'Sale bán hàng',
            6 => 'Sale online'
        ];
    }
}
if (!function_exists('getParseSales')) {
    function getParseSales($tagId)
    {
        if ($tagId == 1) {
            return 'Sale Admin';
        }
        if ($tagId == 2) {
            return 'Telesale';
        }
        if ($tagId == 3) {
            return 'Sale tư vấn';
        }
        if ($tagId == 4) {
            return 'Sale thị trường';
        }
        if ($tagId == 5) {
            return 'Sale bán hàng';
        }
        if ($tagId == 6) {
            return 'Sale online';
        }

    }
}
if (!function_exists('getDegree')) {
    function getDegree()
    {
        return [
            1 => 'Trung cấp',
            2 => 'Cao đẳng',
            3 => 'Đại Học',
            4 => 'Trên đại học',
            5 => 'Cấp 3',
            6 => 'Khác',
        ];
    }
}
if (!function_exists('getDegreeEduction')) {
    function getDegreeEduction()
    {
        return [
            1 => 'Trung bình',
            2 => 'Khá',
            3 => 'Giỏi',

        ];
    }
}
if (!function_exists('getExperience')) {
    function getExperience()
    {
        return [
            1 => 'Chưa có kinh nghiệm ',
            2 => '6 tháng',
            3 => '1 năm',
            4 => '2 năm ',
            5 => '3 năm ',
            6 => 'Nhiều hơn 3 năm ',
        ];
    }
}
if (!function_exists('getRank')) {
    function getRank()
    {
        return [
            1 => 'Nhân viên',
            2 => 'Trưởng nhóm',
            3 => 'Phó phòng',
            4 => 'Trưởng phòng ',
            5 => 'Thực tập sinh ',
        ];
    }
}
if (!function_exists('getParseDegree')) {
    function getParseDegree($rankId)
    {
        if ($rankId == 1) {
            return 'Trung cấp';
        }
        if ($rankId == 2) {
            return 'Cao đẳng';
        }
        if ($rankId == 3) {
            return 'Đại Học';
        }
        if ($rankId == 4) {
            return 'Trên đại học';
        }
        if ($rankId == 5) {
            return 'Cấp 3';
        }
        if ($rankId == 6) {
        return 'Khác';
    }
    }
}
if (!function_exists('getParseExperience')) {
    function getParseExperience($experienceId)
    {
        if ($experienceId == 1) {
            return 'Chưa có kinh nghiệm ';
        }
        if ($experienceId == 2) {
            return '6 tháng';
        }
        if ($experienceId == 3) {
            return '1 năm';
        }
        if ($experienceId == 4) {
            return '2 năm';
        }
        if ($experienceId == 5) {
            return '3 năm';
        }
        if ($experienceId == 6) {
            return 'Nhiều hơn 3 năm ';
        }
    }
}

if (!function_exists('getParseRank')) {
    function getParseRank($rankId)
    {
        if ($rankId == 1) {
            return 'Nhân viên ';
        }
        if ($rankId == 2) {
            return 'Trưởng nhóm';
        }
        if ($rankId == 3) {
            return 'Phó phòng';
        }
        if ($rankId == 4) {
            return 'Trưởng phòng';
        }
        if ($rankId == 5) {
            return 'Thực tập sinh';
        }
    }
}
if (!function_exists('getRandomCode')) {
    function getRandomCode()
    {
        $min = 0;
        $max = 9;
        $string = '';
        for ($i = 0; $i < 6; $i++) {
            $string = $string.mt_rand($min, $max);
        }
        return $string;
    }
}
// Điều mong muốn của ứng viên
if (!function_exists('getCurrentPriority')) {
    function getCurrentPriority()
    {
        return [
            1 => 'Thu nhập',
            2 => 'Kiến thức',
            3 => 'Môi trường',
            4 => 'Cơ hội thăng tiến',
        ];
    }
}
if (!function_exists('getParseCurrentPriority')) {
    function getParseCurrentPriority($rankId)
    {
        if ($rankId == 1) {
            return 'Thu nhập';
        }
        if ($rankId == 2) {
            return 'Kiến thức';
        }
        if ($rankId == 3) {
            return 'Môi trường';
        }
        if ($rankId == 4) {
            return 'Cơ hội thăng tiến';
        }
    }
}
// Khoảng tiền
if (!function_exists('getSalary')) {
    function getSalary()
    {
        return [
            1 => 'Dưới 6,000,000 vnđ',
            2 => '6,000,000 vnđ - 8,000,000 vnđ',
            3 => '8,000,000 vnđ - 10,000,000 vnđ',
            4 => '10,000,000 vnđ - 15,000,000 vnđ',
            5 => '15,000,000 vnđ - 20,000,000 vnđ',
            6 => '20,000,000 vnđ - 30,000,000 vnđ',
            7 => '30,000,000 vnđ - 50,000,000 vnđ',
            8 => '50,000,000 vnđ - 100,000,000 vnđ',
            9 => 'Trên 100,000,000 vnđ',
        ];
    }
}

if (!function_exists('getParseSalary')) {
    function getParseSalary($rankId)
    {
        if ($rankId == 1) {
            return 'Dưới 6,000,000 vnđ';
        }
        if ($rankId == 2) {
            return '6,000,000 vnđ - 8,000,000 vnđ';
        }
        if ($rankId == 3) {
            return '8,000,000 vnđ - 10,000,000 vnđ';
        }
        if ($rankId == 4) {
            return '10,000,000 vnđ - 15,000,000 vnđ';
        }
        if ($rankId == 5) {
            return '15,000,000 vnđ - 20,000,000 vnđ';
        }
        if ($rankId == 6) {
            return '20,000,000 vnđ - 30,000,000 vnđ';
        }
        if ($rankId == 7) {
            return '30,000,000 vnđ - 50,000,000 vnđ';
        }
        if ($rankId == 8) {
            return '50,000,000 vnđ - 100,000,000 vnđ';
        }
        if ($rankId == 9) {
            return 'Trên 100,000,000 vnđ';
        }
    }
}
// loại hình làm việc:
if (!function_exists('getJobType')) {
    function getJobType()
    {
        return [
            1 => 'Toàn thời gian',
            2 => 'Bán thời gian',
            3 => 'Hợp đồng',
            4 => 'Mùa vụ',
        ];
    }
}
if (!function_exists('getParseJobType')) {
    function getParseJobType($rankId)
    {
        if ($rankId == 1) {
            return 'Toàn thời gian';
        }
        if ($rankId == 2) {
            return 'Bán thời gian';
        }
        if ($rankId == 3) {
            return 'Hợp đồng';
        }
        if ($rankId == 4) {
            return 'Mùa vụ';
        }
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($date)
    {
        $timestamp = strtotime($date);
        $strTime = array("giây", "phút", "giờ", "ngày", "tháng", "năm");
        $length = array("60", "60", "24", "30", "12", "10");
        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }
            $diff = round($diff);
            return "cách đây " . $diff . " " . $strTime[$i];
        }
    }
}
