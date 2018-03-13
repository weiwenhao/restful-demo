<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use Helpers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function parseFilter(Builder $query, $where = [])
    {
        //偏移 统一使用通配性更加广泛的page分页
//        $query->offset(request('offset', 0));
//        $query->limit(request('limit', 10));

        //排序
        $query->orderBy(request('sortby', 'id'), request('order', 'desc'));

        //字段限制
        !is_null(request('fields')) && $query->addSelect(explode(',', request('fields')));

        //筛选条件
        foreach ($where as $item) {
            if (is_null($value = request($item))) {
                continue;
            }

            // 关键字逗号不允许随意使用
            if (str_contains($value, ',')) {
                $query->whereIn($item, explode(',', $value));
            } else {
                $query->where($item, '=', $value);
            }
        }

        //分页
        return $query->paginate(request()->get('pre_page', 15))->appends(request()->except('page'));
    }
}
