<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostType;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        return view('pages.posts.index', [
            'posts' => Post::with('tags', 'category', 'postType')->latest()->paginate(12)
        ]);
    }

    public function create()
    {
        return view('pages.posts.create', [
            'categories' => Category::orderBy('name')->get(),
            'post_types' => PostType::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $attr = $request->all();

        // get and store image
        $image_hero = $request->file('image_hero')->store('images/posts');
        $image_l = $request->file('image_l')->store('images/posts');
        $image_s = $request->file('image_s')->store('images/posts');

        // hiject
        $attr['slug'] = Str::slug($request->title) . '-' . uniqid();
        $attr['excerpt'] = Str::words(html_entity_decode(strip_tags($request->body)), 10);
        $attr['image_hero'] = $image_hero;
        $attr['image_l'] = $image_l;
        $attr['image_s'] = $image_s;

        Post::create($attr)->tags()->attach(request('tags'));

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Post $post)
    {
        $post->increment('views');
    }

    public function edit(Post $post)
    {
        return view('pages.posts.edit', [
            'post' => $post,
            'categories' => Category::orderBy('name')->get(),
            'post_types' => PostType::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $attr = $request->all();

        /*
         * get and store image
         * check there is new image
         * if there is new image, image from storage will be delete, and change to new image
         * if there is no new image, value will be the same as before
        */
        if ($request->file('image_hero')) {
            Storage::delete($post->image_hero);
            $image_hero = $request->file('image_hero')->store('images/posts');
        } else {
            $image_hero = $post->image_hero;
        }

        if ($request->file('image_l')) {
            Storage::delete($post->image_l);
            $image_l = $request->file('image_l')->store('images/posts');
        } else {
            $image_l = $post->image_l;
        }

        if ($request->file('image_s')) {
            Storage::delete($post->image_s);
            $image_s = $request->file('image_s')->store('images/posts');
        } else {
            $image_s = $post->image_s;
        }

        // hiject
        $isSameTitle = ($request->title == $post->name);
        $isSameTitle
            ? $attr['slug'] = $post['slug']
            : $attr['slug'] = Str::slug($request->title) . '-' . uniqid();
        $isSameBody = ($request->body == $post->body);
        $isSameBody
            ? $attr['excerpt'] = $post['excerpt']
            : $attr['excerpt'] = Str::words(html_entity_decode(strip_tags($request->body)), 10);
        $attr['image_hero'] = $image_hero;
        $attr['image_l'] = $image_l;
        $attr['image_s'] = $image_s;

        $post->update($attr);
        $post->tags()->sync(request('tags'));

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        // for force delete
        // $post->tags()->detach(request('tags'));

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
