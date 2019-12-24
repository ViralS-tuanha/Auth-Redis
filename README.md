# Auth-Redis

Sau khi tải package về. Cần thực hiện các bước sau để có thể sử dụng:
## Cấu hình file env cho trùng với server Redis của Server Auth
VD:
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=redis
SESSION_LIFETIME=1200
CACHE_PREFIX=LONGND


REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

## Sửa các file config cho phù hợp:
+ Thêm vào providers trong file app.php : TuanHA\AuthApiGateway\AuthApiGatewayServiceProvider::class,
+ Ẩn dòng trong file database:'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),


## chạy publish vendor:
+ chạy command: php artisan vendor:publish --provider=TuanHA\AuthApiGateway\AuthApiGatewayServiceProvider


## Thay thế middleware Auth trong file Kernel.php ỏ biến $routeMiddleware:
+ 'auth' => \TuanHA\AuthApiGateway\AuthenticateRedis::class,
+ 'guest' => \TuanHA\AuthApiGateway\RedirectIfAuthenticatedRedis::class,
