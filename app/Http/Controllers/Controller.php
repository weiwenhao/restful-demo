<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use Helpers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function parseFilter($query, $where = [])
    {
        //排序
        $query->orderBy(request()->get('sort_by', 'id'), request()->get('order', 'desc'));

        //字段限制
        !is_null(request()->get('fields')) && $query->addSelect(explode(',', request()->get('fields')));

        //筛选条件
        foreach ($where as $item) {
            if (is_null($value = request()->get($item))) {
                continue;
            }

            // 关键字逗号不允许随意使用
            if (str_contains($value, ',')) {
                $query->whereIn($item, explode(',', $value));
            } else {
                $query->where($item, '=', $value);
            }
        }

        if ($this->isBlacklist($query)) {
            return new LengthAwarePaginator([], 0, request()->get('pre_page', 15));
        }

        //分页
        return $query->paginate(request()->get('pre_page', 15))->appends(request()->except('page'));
    }

    /**
     * sql语句黑名单检测机制检测机制
     * @param $query
     * @return bool
     */
    private function isBlacklist($query)
    {
        $limit = 100;

        if (request('pre_page') && request('pre_page') < $limit) {
            return false;
        }

        $key = 'sql:'. $query->toSql();

        if (Cache::has($key)) {
            return true;
        }
        if ($query->count() > $limit) {
            Cache::forever($key, date('Y-m-d H:i:s'));
            return true;
        }

        return false;
    }
}
