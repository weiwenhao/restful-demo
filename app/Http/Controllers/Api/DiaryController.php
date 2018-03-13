<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\DiaryTransformer;
use App\Models\Diary;
use App\Models\Goal;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Facade\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DiaryController extends Controller
{
    public function index()
    {
        $paginator = $this->parseFilter(Diary::query(), ['user_id', 'category_id', 'goal_id']);

        return $this->response->paginator($paginator, new DiaryTransformer());
    }

    public function store(Request $request)
    {
        $data = $request->only(['images', 'audio', 'video', 'content', 'goal_id']);
        $goal = Goal::findOrFail($data['goal_id']);

        if ($goal->user_id !== Auth::id()) {
            throw new AccessDeniedHttpException();
        }

        $data['user_id'] = Auth::id();
        $data['category_id'] = $goal->category_id;
        Diary::create($data);

        return $this->response->created();
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
