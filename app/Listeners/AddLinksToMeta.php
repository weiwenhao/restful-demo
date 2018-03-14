<?php

namespace App\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class AddLinksToMeta
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(ResponseWasMorphed $event)
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
//    public function handle(ResponseWasMorphed $event)
//    {
//        // offset 分页模式
//        if (!$event->response->getOriginalContent() instanceof Collection) {
//            return;
//        }
//        $offset = request()->get('offset', 0); //原有offset
//        $limit = request()->get('limit', 15); //原有limit
//
//
//        $previous = request()->fullUrlWithQuery([
//            'limit' => $limit,
//            'offset' => max(0, $offset - $limit)
//        ]);
//
//        $next = request()->fullUrlWithQuery([
//           'limit' => $limit,
//           'offset' => $offset + $limit
//        ]);
//
//        $event->content['meta']['previous'] = $previous;
//        $event->content['meta']['next'] = $next;
//    }
}
