<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassifiedRequest;
use App\Classified, App\Category;
use Carbon\Carbon;
use Auth;

class ClassifiedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classifieds = Classified::with('category', 'category.parent')->ownedBy(Auth::user()->id)->recent()->paginate(10);
        return view('pages.classifieds.index')->with(compact('classifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classified = new Classified;
        $classified->quantity = 1;
        
        return view('pages.classifieds.create')->with(compact('classified'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClassifiedRequest $request)
    {
        $classified = new Classified($request->only(
            'title',
            'category_id',
            'price',
            'quantity',
            'photo',
            'description'
        ));

        $classified->user_id = Auth::user()->id;
        $classified->expires_at = Carbon::now()->addDays(30);
        $classified->is_approved = 1;
        $classified->save();

        return redirect(route('classifieds.index'))->withSuccess('İlanınız başarıyla kaydedilip yayına alınmıştır');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $classified = Classified::findOrFail($id);
        return view('pages.classifieds.edit')->with(compact('classified'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ClassifiedRequest $request, $id)
    {
        $classified = Classified::findOrFail($id);
        $classified->fill($request->only(
            'title',
            'category_id',
            'price',
            'quantity',
            'photo',
            'description'
        ));

        $classified->expires_at = Carbon::now()->addDays(30);
        $classified->save();

        return back()->withSuccess('İlanınız güncellenmiştir ve süresi uzatılmıştır');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(ClassifiedRequest $request, $id)
    {
        Classified::findOrFail($id)->delete();
        return back()->withSuccess('İlan başarıyla silinmiştir');
    }
}
