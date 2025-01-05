<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pages = Page::withCount('posts')->paginate('5');
        return view('pages.org-pages.read', ['data' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return route();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $page = new Page();
        $page->name = $request->input('name');
        $saved = $page->save();
        return response()->json(['status' => true, 'message' => $saved ? 'Created Successfully' : 'Created Failed'], $saved ? 200 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    public function editPagePosts(Request $request, Page $page)
    {
        $posts = Post::all();
        $pagePosts = $page->posts;
        // dd($pagePosts);
        if (count($pagePosts) > 0) {
            foreach ($pagePosts as $pagePost) {
                foreach ($posts as $post) {
                    if ($pagePost->id == $post->id) {
                        $post->setAttribute('assigned', true);
                    }
                }
            }
        }


        return view('pages.org-pages.page-posts', ['posts' => $posts, 'page' => $page]);
    }
    public function updatePagePosts(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'post_id' => 'required|exists:posts,id',
        ]);
        if (!$validator->fails()) {
            $page->posts()->attach($request->post_id);
            return response()->json(['status' => true, 'message' => 'updated successfully'], 200);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            // 'guard_name' => 'required|string|in:admin,user',
        ]);
        if (!$validator->fails()) {
            $page->name = $request->input('name');

            $updated = $page->save();
            return response()->json(['status' => true, 'message' => $updated ? "Updated Succefully" : "Updated Falied"], 200);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedRow = Page::destroy($id);
        // $deleted = $deletedRow > 0;
        return response()->json(['status' => $deletedRow > 0, 'message' => $deletedRow > 0 ? "Deleted Successfully" : "Deleted Failed"], $deletedRow > 0 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
