<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */

     //On If in production
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // return;
        });


    }

    // public function render($request, Throwable $e)
    // {
        // if ($request->is('*/*')) {

        //     return redirect('/dashboard');

        //     return response()->json([
        //         'message' => 'Record not found.'
        //     ], 404);
        // }

        // return parent::render($request, $e);

        // if ($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
        //     return abort(404);
        // }

        //  return parent::render($request, $e);
    // }
}