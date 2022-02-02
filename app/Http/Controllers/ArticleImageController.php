<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use App\Http\Requests\StoreArticleImageRequest;
use App\Http\Requests\UpdateArticleImageRequest;
use Illuminate\Http\Request;


class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleImages = ArticleImage:: all();
        return view('articleimage.index', ['articleImages' => $articleImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articleimage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleImage = new ArticleImage;
        $articleImage->alt = $request->image_alt;

           // time();
           $imageName = 'image' . time().'.'.$request->image_src->extension();

           $request->image_src->move(public_path('images') , $imageName);

           $articleImage->src = $imageName;

        $articleImage->width = $request->image_width;
        $articleImage->height = $request->image_height;
        $articleImage->class = $request->image_class;

        $articleImage->save();
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        return view('articleimage.edit',['articleImage'=> $articleImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleImageRequest  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleImage $articleImage)
    {
        // time();
        if($request->has('image_src')) {
            $imageName = 'image' . time().'.'.$request->image_src->extension();
            $request->image_src->move(public_path('images') , $imageName);
            $articleImage->src = $imageName;
        }
        $articleImage->alt = $request->image_alt;
        $articleImage->width = $request->image_width;
        $articleImage->height = $request->image_height;
        $articleImage->class = $request->image_class;

        $articleImage->save();
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
    {
        //
    }
}
