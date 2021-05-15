<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostController extends Controller
{
    public function list()
    {
        return view('posts', [
            'posts' => Post::latest('published_at')->get(),
        ]);
    }

    public function listInCategory(Category $category)
    {
        return view('posts', [
            'posts' => $category->posts,
            'category' => $category,
        ]);
    }

    public function listInUser(User $author)
    {
        return view('posts', [
            'posts' => $author->posts,
            'author' => $author,
        ]);    
    }
 
    public function read(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function publish(Request $request)
    {
        $category_name = $request->input('category');
        $post_title = $request->input('title');
        $post_body = $request->input('body');

        // このへんはログインの機能とか作ったときに作り直す
        // $user = User::where('username', 'NaokoYamada')->first();
        $user = User::factory()->create();

        // カテゴリー名を取得し、データベース内を検索
        $category = Category::where('name', $category_name)->first();

        // カテゴリーが存在しなければ、新しくカテゴリーを生成
        if (!isset($category)) {
            $category = Category::factory()->create([
                'name' => $category_name,
            ]);
        }
        
        // 新しい記事を生成
        $post = Post::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'published_at' => date('Y-m-d H:i:s'),
        ]);
        
        // 作成した記事にリダイレクト
        return redirect('posts/' . $post->slug);
    }

    public function edit(Post $post)
    {
        return view('edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $category_name = $request->input('category');
        $post_title = $request->input('title');
        $post_body = $request->input('body');

        // カテゴリー名を取得し、データベース内を検索
        $category = Category::where('name', $category_name)->first();

        // カテゴリーが存在しなければ、新しくカテゴリーを生成
        if (!isset($category)) {
            $category = Category::factory()->create([
                'name' => $category_name,
            ]);
        }

        // 編集した内容で更新
        $post->update([
            'category_id' => $category->id,
            'title' => $post_title,
            'body' => $post_body,
        ]);

        // 編集した記事にリダイレクト
        return redirect('posts/' . $post->slug);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
