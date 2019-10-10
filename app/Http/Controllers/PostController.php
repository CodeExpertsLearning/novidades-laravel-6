<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->orderBy('id', 'DESC')->paginate(30);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            // Criando post usando Active Record
            // $post = $this->post;
            // $post->title = $data['titulo_alguma'];
            // $post->description = $data['description'];

            // $post->save();
            //Criando post usando Mass Assignment
            $post = $this->post->create($data);

            flash('Post criado com sucesso!')->success();
            return redirect()->route('posts.index');

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();

                return redirect()->back();
            }

            flash('Post não foi criada com sucesso!')->warning();
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = $this->post->findOrFail($id);

            return view('posts.edit', compact('post'));

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }

            flash('Post não encontrado...')->warning();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->all();

            $post = $this->post->findOrFail($id);
            $post->update($data);

            flash('Post atualizado com sucesso!')->success();
            return redirect()->route('posts.index');

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            flash('Post não foi atualizado...')->warning();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $post = $this->post->findOrFail($id);
            $post->delete();

            flash('Post removido com sucesso!')->success();
            return redirect()->route('posts.index');

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }

            flash('Post não pode ser removido...')->warning();
            return redirect()->back();
        }
    }
}
