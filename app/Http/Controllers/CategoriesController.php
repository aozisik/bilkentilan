<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category, App\Classified;

class CategoriesController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if($category->parent_id) {
            $query = Classified::where('category_id', $id);

        } else {
            $query = Classified::whereHas('category', function($q) use($category) {
                $q->where('parent_id', $category->id);
            });
        }

        $classifieds = $query->active()->recent()->paginate(10);

        return view('pages.categories.show')
            ->with(compact('category'))
            ->with(compact('classifieds'));
    }

}
