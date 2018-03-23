<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DiaryLikeController extends Controller
{
    public function store(Request $request, $diaryId)
    {
        DB::table('user_like_diary')->insert([
            'user_id' => \Auth::id(),
            'diary_id' => $diaryId
        ]);

        return $this->response->created();
    }

    public function destroy($diaryId)
    {
        DB::table('user_like_diary')->where('user_id', \Auth::id())->where('diary_id', $diaryId)->delete();

        return $this->response->noContent();
    }
}
