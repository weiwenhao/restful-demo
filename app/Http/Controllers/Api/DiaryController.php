<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\DiaryTransformer;
use App\Models\Diary;
use App\Models\Goal;
use Dingo\Api\Facade\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DiaryController extends Controller
{
    public function index($query = null)
    {
        $paginator = $this->parseFilter($query ?? Diary::query());

        return $this->response->paginator($paginator, new DiaryTransformer());
    }


    public function store(Request $request)
    {
        $diary = new Diary();
        $diary->user_id = \Auth::id();
        $diary->goal_id = \Auth::user()->goal_id;
        $diary->category_id = \Auth::user()->category_id;
        $diary->content = $request->get('content');
        $diary->audio = $request->get('audio', '');
        $diary->video = $request->get('vidoe', '');
        $diary->images = $request->get('images', []);
        $diary->save();
        return $this->response->item($diary, new DiaryTransformer())->setStatusCode(201);
    }

    public function show($id)
    {
        return $this->response->item(Diary::findOrFail($id), new DiaryTransformer());
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $this->authorize('delete', $diary);

        $diary->delete();

        return $this->response->noContent();
    }
}
