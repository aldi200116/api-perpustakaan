<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use closure;
use PhpParser\Node\Stmt\TryCatch;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use PhpParser\Node\Stmt\Return_;

class JWTAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('api/v1/account/login')){
           return $next($request);
        }
        $token = $request->bearerToken();
        if (isset($token)){
            $key= env('JWT_KEY','S3cretKeyToken');
            try {
                $decode = JWT::decode($token, new Key($key,'HS256'));
                return $next($request);
            } catch (\Exception $ex) {
                return response()
                ->json([
                    'status'=>401,
                    'success'=> false,
                    'message'=> $ex->getMessage()
                ],401);
            }
        }else {
            return response()
            ->json([
                'status'=>401,
                'success'=> false,
                'message'=> 'token not found'
            ],401);
            
        }
      
       
    }
}