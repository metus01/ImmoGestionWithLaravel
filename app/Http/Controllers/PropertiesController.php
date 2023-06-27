<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PropertyFormRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();
        // if($request->has('price'))
        // {
        //     $query = $query->where('price','<=' , $request->input('price'));
        // }

        // if($request->has('surface'))
        // {
        //     $query = $query->where('surface','=>' , $request->input('surface'));
        // }
        // if($request->has('rooms'))
        // {
        //     $query = $query->where('rooms','<=' , $request->input('rooms'));
        // }
        // if($request->has('title'))
        // {
        //     $query = $query->where('title','like' , "%{$request->input('price')}%");
        // }
        return view('index',
         [
            'properties' => $query->paginate(16)
            // 'input' => $request->validated()
        ]);
    }
    public function show(string $slug , Property $property)
    {
        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug)
        {
            return to_route('property.show',
            [
                'slug' => $expectedSlug,
                'property' => $property
            ]);
        }
        return view('property.show',
        [
            'property' => $property
        ]);
    }
    public function contact(Request $request)
    {
        dd($request->getPathInfo());
    }
}
