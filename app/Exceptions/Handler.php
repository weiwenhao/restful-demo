<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function prepareResponse($request, Exception $e)
    {
//        /**
//         * if (! $this->isHttpException($e) && config('app.debug')) {
//                return $this->toIlluminateResponse(
//                    $this->convertExceptionToResponse($e), $e
//                );
//            }
//         */

        if (config('app.debug')) {
            return $this->toIlluminateResponse(
                $this->convertExceptionToResponse($e), $e
            );
        }

        if (! $this->isHttpException($e)) {
            $e = new HttpException(500, $e->getMessage());
        }

        return $this->toIlluminateResponse(
            $this->renderHttpException($e), $e
        );
    }
}
