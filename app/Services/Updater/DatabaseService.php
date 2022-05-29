<?php

declare(strict_types=1);

namespace App\Services\Updater;

class DatabaseService
{
    /**
     * @var \Illuminate\Database\Migrations\Migrator
     */
    private $migrator;

    public function __construct()
    {
        $this->migrator = app('migrator');
    }

    /**
     * Laravelマイグレーションが必要かどうかを確認
     */
    public function isMigrationRequired(): bool
    {
        // 実行済みマイグレーションの一覧を取得
        $ran = $this->migrator->getRepository()->getRan();

        // マイグレーションファイルの一覧を取得
        // TODO: 標準のマイグレーションファイルパス以外にあるマイグレーションファイルにも対応したい
        $migrations = $this->migrator->getMigrationFiles([database_path('migrations')]);
        $migrations = collect($migrations)->keys()->map(function ($key) {
            return $key;
        });

        return $migrations->diff($ran)->isNotEmpty();
    }
}
