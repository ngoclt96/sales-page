<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class History extends Model
{

    protected $fillable = [
        'user_id', 'project_id', 'content', 'time_in', 'time_out'
    ];

    protected $dates = [
        'time_in', 'time_out'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function saveReportToHistory($arr){
        $model = new History;
        $model->fill($arr);
        if ( $model->save() ) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $model]);
        }
        return response()->json(['status' => false, 'message' => 'fail']);
    }

    public static function getReportHistory($time = null, $id = null) {
        if (is_null($id)) $id       = \Auth::user()->id;
        $model                      = new History;
        $time   = Carbon::now()->format('Y-m-d');

        $reportHistory = $model::where('user_id', $id)
            ->whereDate('time_in', 'like', $time . '%')
            ->get();

        return $reportHistory;
    }
}
