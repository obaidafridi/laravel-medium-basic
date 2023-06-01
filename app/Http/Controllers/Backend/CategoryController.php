<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Validations\CategoryValidation;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories =  $this->categoryRepository->allCategories();
            return view('backend.category.index', compact('categories'));
        } catch (\Exception $e) {
            toastr()->error('An error occurred while getting the category.');

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = CategoryValidation::storeValidate($request);
        try {
            $this->categoryRepository->storeCategory($data);

            toastr()->success('Category Created Successfully');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            toastr()->error('An error occurred while creating the category.');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = $this->categoryRepository->findCategory($id);

            return view('backend.category.edit', compact('category'));
        } catch (\Exception $e) {
            toastr()->error('An error occurred while editing the category.');

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CategoryValidation::updateValidate($request);
        try {
            $this->categoryRepository->updateCategory($request->all(), $id);

            toastr()->success('Category Updated Successfully');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            toastr()->error('An error occurred while updating the category.');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryRepository->destroyCategory($id);

            toastr()->success('Category Deleted Successfully');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            toastr()->error('An error occurred while deleting the category.');

            return redirect()->back();
        }
    }
}
