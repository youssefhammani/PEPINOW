<?php

namespace App\Http\Controllers;

use App\Models\plants;
use App\Http\Requests\StoreplantsRequest;
use App\Http\Requests\UpdateplantsRequest;
use App\Models\Categories;
use PHPOpenSourceSaver\JWTAuth\Contracts\Providers\Auth;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'plants' => Plants::all(),
        ]);
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
     * @param  \App\Http\Requests\StoreplantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreplantsRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData == false)
        {
            return response()->json([
                'validated Data' => 'is not valid',
            ]);
        }

        return response()->json([
            'validated Data' => $validatedData,
        ]);

        $user = auth()->user();
        $plant = Plants::create($request->all() + ['user_id' => $user->id]);

        return response()->json([
            'Message' => 'Plant added successfully!',
            'Plant' => $plant,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is_find = Plants::find($id);
        $category = Categories::find($is_find->category_id);

        if (!$is_find) {
            return response()->json([
                'Message' => "Plants with (id : {$id}) doesn't exist!",
            ]);
        }

        return response()->json([   
            'Message' => "success",
            'Plant' => $is_find,
            'Category' => $category->category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(plants $plants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateplantsRequest  $request
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateplantsRequest $request, $id)
    {
        $user = auth()->user();
        $plant = Plants::find($id);
        
        if(!$plant)
            return response()->json([
                'message' => "Product with (id : {$id} doesn't exist!)"
            ]);
            
        if (!$user->can('edit every plant') && $user->id != $plant->user_id)
            return response()->json([
                'message' => "You don't have permission to edit this plant"
            ], 403);

            $plant->update(request()->all() + ['user_id' => $user->id]);
            
        //     $validatedData = $request->validate([
        //         'name' => 'required|max:255',
        //     'description' => 'required',
        //     'price' => 'required|numeric',
        // ]);
        
        // $plant->name = $validatedData['name'];
        // $plant->description = $validatedData['description'];
        // $plant->price = $validatedData['price'];
        
        // $plant->save();
        
        return response()->json([
            
            'status' => true,
            'message' => 'Plant updated successfully!',
            'data' => $plant
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy(plants $plants)
    {
        //
    }
}
