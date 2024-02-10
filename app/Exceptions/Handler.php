<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function(Exception $e, Request $request){
            if($request->is('api/*')){
                $data['exception_message'] = $e->getMessage();
                $data['exception_code'] = $e->getCode();
                $data['exception_line'] = $e->getLine();
                $data['exception_file'] = $e->getFile();
                \Log::error("Exception message" .$data['exception_message'].
                " __LINE__ " .$data["exception_line"]. " __Code__ " .$data["exception_code"]. " __file__ "
                .$data["exception_file"]);

                return response()->json(
                    [
                        "error" => true, 
                        "message" => $data["exception_message"],
                        "data" => $data
                ]);
            }
        });
    }
}
