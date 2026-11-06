<?php

namespace App\Http\V1;

use illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $request;
    protected $builder;
    protected $sortables = [];
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
}
