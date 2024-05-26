// app/Http/Controllers/Auth/LoginController.php

/    // app/Exceptions/Handler.php

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
[...]
use Illuminate\Auth\AuthenticationException;
use Auth;
[...]
class Handler extends ExceptionHandler
{
   [...]
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/login/admin');
        }
        if ($request->is('writer') || $request->is('writer/*')) {
            return redirect()->guest('/login/writer');
        }
        return redirect()->guest(route('login'));
    }
}


$table->string('email');
            $table->string('userName');
            $table->date('DOB');
            $table->string('townshipCode');
            $table->string('role');
