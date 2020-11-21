<?php 

use Carbon\Carbon;

    if (!function_exists('api_response')) {
        function api_response($success, $message = null, $data = null, $code = 200)
        {
            return response()->json([
                'status' => $success == 1 ? 'success' : 'failed',
                'message' => $message,
                'data' => $data
            ], $code);
        }
    }
    
    if (!function_exists('getRandomPassword')) {
        function getRandomPassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }
    }

    if (!function_exists('getProgress')) {
        function getProgress($start_date, $end_date)
        {
            $start = Carbon::parse($start_date);
            $end = Carbon::parse($end_date);
            $now = Carbon::now();
            
            $diff_from_now = $end->diff($now);
            $diff_from_start = $end->diff($start);


            $total_min_from_start = ($diff_from_start->d * 24 + $diff_from_start->h) * 60;
            $total_min_from_now = ($diff_from_now->d * 24 + $diff_from_now->h) * 60;

            $dfn = $diff_from_now;
            $time_remain = '';
            $percentage = 0;

            if ($now->greaterThanOrEqualTo($end)) {
                $time_remain = 'Selesai';
                $percentage = 100;
            } else {
                if ($dfn->d != 0) {$time_remain = "$dfn->d Hari Tersisa";} 
                else if ($dfn->d === 0 && $dfn->h !== 0 && $dfn->i !== 0) {$time_remain = "$dfn->h Jam $dfn->i Menit Tersisa";}
                else if ($dfn->d === 0 && $dfn->h === 0 && $dfn->i !== 0) {$time_remain = "$dfn->i Menit Tersisa";}
                $percentage = (($total_min_from_start - $total_min_from_now +1) / $total_min_from_start) * 99.99;
            }

            $progress = (object) [
                'percentage' => $percentage,
                'time_remain' => $time_remain
            ];

            return $progress;
        }
    }

?>