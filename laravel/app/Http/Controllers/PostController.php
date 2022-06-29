<?php

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Contrller
{
    //Exiba uma listagem do recurso.
    public function index(){
        $data = Post::latest()->paginate(5);

        return view('post.index', compact('data'))
        ->with('i',(request()->input('page',1) -1) * 5);
    }
    
    //Mostre o formulário para criar um novo recurso.
    public function create(){
        return view('posts,create');
    }

    //Armazene um recurso recém-criado no armazenamento.
    public function store(Request $request){
        $request ->validate(['title' => 'required','description'=> 'required',]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('sucess','Post crated successfully.');
    }

    //Exibe o recurso especificado.
    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

    //Atualize o recurso especificado no armazenamento.
    public function update(Request $request, Post $post){
        $request->validate(['title'=>'required','description'=>'required']);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('sucess','Post updated successfully');
    }
    
    //Remova o recurso especificado do armazenamento.
    public function destroy(Post $post){
        $post->delete();
        
        return redirect()->rout('posts.index')
        ->with('success','Post deleted successfully');
    }

}