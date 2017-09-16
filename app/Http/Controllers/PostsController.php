<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {

      $this->middleware('auth')->except(['index', 'show']);

    }

    public function index(Posts $posts)
    {    
        
      $posts = $posts->all();
        
      /*$posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();  */      
        

      /*$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(created_at) desc')
                        ->get()
                        ->toArray();*/
        
       /* $archives = Post::archives(); 

    	return view('posts.index', compact('posts', 'archives')); -- moved to service providers */
        
        return view('posts.index', compact('posts'));

    }


    public function show(Post $post)
    {

      //$post = Post::find($id);

    	return view('posts.show', compact('post'));

    }


    public function create()
    {
      return view('posts.create');
    }


    public function store()
    {

      // $post = new Post;
      //
      // $post->title = request('title');
      // $post->body = request('title');
      //
      // $post->save();

      // Post::create([
      //
      //   'title' => request('title'),
      //
      //   'body' => request('body')
      //
      // ]);

      $this->validate(request(),[

          'title' => 'required',
          'body'  => 'required'

      ]);  //Validates post and if validation fails redirects to the form

      //Post::create(request(['title', 'body']));


      auth()->user()->publish(

          new Post(request(['title', 'body']))

      );


      return redirect('/');

    }


}
