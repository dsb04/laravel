<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class PostRepositorty extends BaseRepository
{
    public function model()

    {
        return 'App\Models\Post';
    }
}
