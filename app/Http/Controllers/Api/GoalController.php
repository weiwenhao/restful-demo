<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\GoalTransformer;
use App\Models\Goal;
use Dingo\Api\Auth\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoalController extends Controller
{
    public function index()
    {
        $paginator = $this->parseFilter(Goal::query(), ['user_id', 'category_id']);

        return $this->response->paginator($paginator, new GoalTransformer());
    }

    public function store(Request $request)
    {
        $goal = new Goal();
        $goal->name = $request->get('name');
        $goal->began_at = $request->get('began_at');
        $goal->ended_at = $request->get('ended_at');
        $goal->user_id = Auth::id();
        $goal->save();

        return $this->response->created();
    }

    public function show($id)
    {
        return $this->response->item(Goal::findOrFail($id), new GoalTransformer());
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::findOrFail($id);

        $this->authorize('update', $goal);

        $request->has('name') && $goal->name = $request->get('name');
        $request->has('began_at') && $goal->began_at = $request->get('began_at');
        $request->has('ended_at') && $goal->ended_at = $request->get('ended_at');
        $goal->save();
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);

        $this->authorize('delete', $goal);

        $goal->delete();

        return $this->response->noContent();
    }
}
