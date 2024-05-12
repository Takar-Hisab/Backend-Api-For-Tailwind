<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ServiceProvider;

/**
 * @method simplePaginate($perPage)
 * @method paginate($perPage)
 */
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        Builder::macro('whereLike', function ($attributes, $searchTerm){
//            $this->where(function (Builder $query) use($attributes, $searchTerm){
//                foreach (Arr::wrap($attributes) as $attribute){
//                    $query->when(str_contains($attribute, '.'), function (Builder $query)use($attribute, $searchTerm){
//                        [$relationName, $relationAttribute] = explode('.', $attribute);
//                        $query->orWhereHas($relationName, function (Builder $query)use($relationAttribute, $searchTerm){
//                            $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
//                        });
//                    },
//                    function (Builder $query)use($attribute, $searchTerm){
//                        $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
//                    });
//                }
//            });
//            return $this;
//        });



        Builder::macro('search', function ($attributes, $searchTerm) {
            return $this->whereAny($attributes, 'LIKE', "%{$searchTerm}%")
                ->orderBy(request()->sort ?? 'id', request()->order ?? 'desc')
                ->paginate(request()->limit ?? 15);
        });

        Builder::macro('sortBy', function (){
            return $this->orderBy(request()->input('orderBy') ?? 'id', request()->input('sortBy') ?? 'desc');

//            $this->when($orderBy === 'random', function ($query) {
//                $query->inRandomOrder();
//            })
//            ->when($sortBy && $orderBy && in_array($orderBy, ['asc', 'desc']), function ($query) use ($sortBy, $orderBy) {
//                $query->orderBy($sortBy, $orderBy);
//            })
//            ->when($sortBy && !$orderBy, function ($query) use ($sortBy) {
//                $query->latest($sortBy);
//            })
//            ->when(!$sortBy && !$orderBy, function ($query) {
//                $query->latest();
//            });
//            return $this;
        });

        Builder::macro('dateRange', function ($column, $date) {
            $this->when(count($date), function (Builder $query) use ($column, $date) {
                $startDateTime = Carbon::parse($date[0])->startOfDay();
                $endDateTime = Carbon::parse($date[1])->endOfDay();
                $query->whereBetween($column, [$startDateTime, $endDateTime]);
            });
            return $this;
        });

        Builder::macro('pagination', function ($simple=false){
            $pages = $simple ? $this->simplePaginate(request()->input('perPage') ?? 10) : $this->paginate(request()->input('perpage') ?? 10);
            return $pages->withQueryString();
        });

    }
}
