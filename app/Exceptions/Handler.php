<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
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
     * @return \Symfony\Component\HttpFoundation\Response

     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    //     protected function renderHttpException(\Symfony\Component\HttpKernel\Exception\HttpException $e)
    // {
    // 　　// ステータスコードを確認し、404であれば404
    //     if ($e->getStatusCode() == 404) {
    //         return response()->view('errors.404', [], 404);
    //     }
    //     $service = new ErrorHandlerService();
    // 　　// エラーログ書き込み処理
    //     $service->errorRenderCreateLog($e,'例外エラーが発生（render内）');
    // 　　// エラーメール送信処理
    //     $service->errorRenderSendMail($e);
    // 　　// 共通エラーページ呼び出し
    //     return response()->view('errors.500', [], 500);
    // }
}
