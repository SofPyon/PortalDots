<?php

namespace App\Http\Controllers\Admin\Migrator;

use App\Http\Controllers\Controller;

class IndexAction extends Controller
{
    public function __invoke()
    {
        return view('admin.migrator.index');
    }
}
