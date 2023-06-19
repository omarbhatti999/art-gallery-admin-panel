<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtResource;
use App\Models\Category;
use App\Models\Art;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getCategories()
    {
        try{
            $categories = Category::all();
            return $this->successResponse($categories);
        }
        catch(\Exception $e){
            return $this->failureResponse("Something went wrong!");
        }

    }

    public function getCategoryArts($id){
        try {
            $arts = Art::with(['category','artImage'])->where([
                'category_id' => $id,
                'featured' => 1,
                'active' => 1
            ])
            ->get();

        return $this->successResponse(ArtResource::collection($arts));

        } catch (\Exception $e) {
            dd($e);
            return $this->failureResponse('Something went wrong');
        }
    }
}
