<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Auth\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DiaryLikeController extends Controller
{
    public function store(Request $request, $diaryId)
    {
        DB::table('user_like_diary')->insert([
            'user_id' => Auth::id(),
            'diary_id' => $diaryId
        ]);
    }

    public function destroy($diaryId)
    {
        DB::table('user_like_diary')->where('user_id', Auth::id())->where('diary_id', $diaryId)->delete();
    }
}
