<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException && $exception->getStatusCode() == 404) {
            $locale = "";
            $view = "";
            if (strpos($request->url(), '/en') !== false) {
                $locale = 'en';
                $view = "en.errors.404";
            } else {
                $locale = 'fr';
                $view = "errors.404";
            }
            app()->setlocale($locale);
            return $locale == "fr" ? response()->view('errors.404', [], 404) : response()->view($view, [], 404);
        }

        return parent::render($request, $exception);
    }
}
