<?php

namespace App\Repositories;

use App\Redis;
use App\Post;


class Posts
{
    
    public function __construct(Redis $redis)
    {
        
        $this->redis = $redis;
        
    }
    
    public function all()
    {
        
        return Post::all();
        
    }
    
}