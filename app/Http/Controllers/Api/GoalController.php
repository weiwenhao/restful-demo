<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\GoalTransformer;
use App\Models\Goal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoalController extends Controller
{
    public function index($query = null)
    {
        $paginator = $this->parseFilter($query ?? Goal::query(), ['user_id', 'category_id']);
        return $this->response->paginator($paginator, new GoalTransformer());
    }

    public function store(Request $request)
    {
        $goal = new Goal();
        $goal->name = $request->get('name');
        $goal->began_at = $request->get('began_at');
        $goal->ended_at = $request->get('ended_at');
        $goal->user_id = \Auth::id();
        $goal->category_id = $request->get('category_id');
        $goal->save();

        return $this->response->item($goal, new GoalTransformer())->setStatusCode(201);
    }

    public function show($id)
    {
        return $this->response->item(Goal::findOrFail($id), new GoalTransformer());
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);

        $this->authorize('delete', $goal);

        $goal->delete();

        return $this->response->noContent();
    }
}
