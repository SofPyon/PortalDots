<?php

namespace App\Http\Middleware;

use App\Services\Updater\DatabaseService;
use Closure;
use App\Services\Utils\DotenvService;
use Illuminate\Support\Facades\Auth;

/**
 * マイグレーションが必要な場合、管理者を除いてメンテナンス中表示とする
 */
class DenyIfMigrationRequired
{
    /**
     * @var DatabaseService
     */
    private $databaseService;

    public function __construct(DatabaseService $databaseService)
    {
        $this->databaseService = $databaseService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->databaseService->isMigrationRequired()) {
            $user = Auth::user();
            if (!isset($user) || !$user->is_admin) {
                return response()->view('migrator.index', [], 503);
            }

            // 管理者の場合、マイグレーションを実行するためのページに遷移する
            return redirect('admin.migrator.index');
        }

        return $next($request);
    }
}
