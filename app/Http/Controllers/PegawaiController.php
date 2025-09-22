<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function index()
    {
        $name              = 'Nofita';

        $tanggal_lahir     = '2004-11-18';
        $today         = Carbon::today();
        $birth_date    = Carbon::parse($tanggal_lahir);
        $my_age        = $birth_date->age;

        $hobbies = [
            'tidur',
            'makan',
            'mendengarkan musik',
            'ngopi',
            'jalan-jalan'
        ];

        $tgl_harus_wisuda  = '2028-10-30';
        $wisuda_date       = Carbon::parse($tgl_harus_wisuda);
        $time_to_study_left = $today->diffInDays($wisuda_date, false);
        if ($time_to_study_left < 0) {
            $time_to_study_left = 0;
        }

        $current_semester  = 3;
        if ($current_semester < 3) {
            $semester_info = "Masih Awal, Kejar TAK";
        } else {
            $semester_info = "Jangan main-main, kurang-kurangi main game!";
        }

        $future_goal       = 'Menjadi Data Scientist';

        $data['name']               = 'Nofita';
        $data['my_age']             = $my_age;
        $data['hobbies']            = ['tidur','makan','musik','ngopi','jalan-jalan'];
        $data['tgl_harus_wisuda']   = $tgl_harus_wisuda;
        $data['time_to_study_left'] = $time_to_study_left;
        $data['current_semester']   = $current_semester;
        $data['semester_info']      = $semester_info;
        $data['future_goal']        = 'Menjadi Data Scientist';

        return view('profile', $data);
    }
}
