<?php

namespace App\Http\Filters\Post;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const STITLE = "stitle";
    public const ORDER = "order";
    public const TAGS = "tags";

    protected function getCallbacks(): array
    {
        return [
            self::STITLE => [$this, "stitle"],
            self::ORDER => [$this, "order"],
            self::TAGS => [$this, "tags"],
        ];
    }

    public function stitle(Builder $builder, string $stitle)
    {
        $builder->where("title", "LIKE", "%{$stitle}%");
    }

    public function order(Builder $builder, string $order)
    {
        if ($order === "new") $builder->latest("created_at");
        else if ($order === "cup") $builder->oldest("comments");
        else if ($order === "cdown") $builder->latest("comments");
        else if ($order === "lup") $builder->oldest("likes");
        else if ($order === "ldown") $builder->latest("likes");
        else $builder->oldest("created_at");
    }

    public function tags(Builder $builder, array $tags)
    {
        foreach ($tags as $tag) {
            $builder->whereHas("tags", function ($query) use ($tag) {
                $query->where("tag_id", (int)$tag);
            });
        }
    }

}
