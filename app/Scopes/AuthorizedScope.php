<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AuthorizedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
    // per visualizzare solo gli elementi dell'utente auth
        if(auth()->check() && !auth()->user()->is_admin && !auth()->user()->is_publisher){
            $organization_id = auth()->user()->organization_id ?? auth()->id();
            $builder->where('user_id', $organization_id);
        }
    }
}
