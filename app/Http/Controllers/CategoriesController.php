<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['categories' => Categories::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        $is_create = Categories::create($request->only('category'));

        if ($is_create)
        {
            return response()->json([
                'message' => 'Category created saccessfully'
            ], 200);
        } else {
            return response()->json([
                'errors' => 'This Category is not created'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is_find = Categories::find($id);
        
        if (!$is_find) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }
            
        return response()->json([
            'status' => 'success',
            'Category' => $is_find
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
        $is_find = Categories::find($id);

        if ($is_find)
        {
            $is_find->update(
                $request->only('category')
            );

            return response()->json([
                'message' => 'Category Updated successfullyl',
                'Category' => $is_find,
            ]);
        } else {

            return response()->json([
                'message' => 'No Category Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_deleted = DB::table('categories')->where('id', $id)->delete();
        
        if ($is_deleted)
            return response()->json(['message' => 'category Deleted successfully'], 200);
        else
        return response()->json(['message' => 'category not Found'], 404);
    }
}
