<?php

namespace App\Http\Transformers;

use App\Models\Diary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiaryTransformer extends Transformer
{
    protected $availableIncludes = ['user', 'is_like'];
    protected $disableEagerLoadedIncludes = ['is_like'];

    public function transform(Diary $diary)
    {
        return $diary->toArray();
    }

    public function includeUser(Diary $diary)
    {
        return $this->item($diary->user, new UserTransformer());
    }

    public function includeIsLike(Diary $diary)
    {
        $likeDiaryIds = DB::table('user_like_diary')->where('user_id', Auth::id())->pluck('diary_id')->toArray();

        return $this->primitive(in_array($diary->id, $likeDiaryIds));
    }
}