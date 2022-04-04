<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Api\BaseController;

class BlogController extends BaseController
{
    public function index(Request $request)
    {

        if (request()->filled('search')) {
            $blogs = Blog::where('title', 'like', "%" . request('search') . "%")
                ->orWhere('description', 'like', "%" . request('search') . "%");
            return $this->sendResponse($blogs->paginate($request->entries), __('responseMessages.blogsFetch'));
        }

        if (request()->filled('page')) {
            $blogs = Blog::latest('id')->paginate($request->entries);
        } else {
            $blogs = Blog::latest('id')->paginate($request->entries);
        }

        return $this->sendResponse($blogs, __('responseMessages.blogsFetch'));
     }

     public function getBlogById($id)
     {
        $blog = Blog::find($id);
        return $this->sendResponse($blog, __('responseMessages.blogsFetch'));

     }
}
