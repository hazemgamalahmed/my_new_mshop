<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $q = $request->query('search');

        return view('admin.category.index' , [
            'categories' => Category::with(['parent'])
                ->where('name' , 'LIKE' , "%{$q}%")
                ->paginate($request->query('limit' , 5))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.category.create' , [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CategoryRequest $request)
    {
        $request = $this->levelHandle($request);
        $category = Category::create($request->all());

        return redirect(route('categories.show' , $category));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function show(Category $category)
    {
        return view('admin.category.show' , [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit' , [
            'category' => $category ,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse|Redirector
     */
    public function update(CategoryRequest $request , Category $category)
    {
        $request = $this->levelHandle($request);
        $category->update($request->all());
        return redirect(route('categories.show' , $category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }

    /**
     * @param $request
     * @return mixed
     */
    private function levelHandle($request)
    {

        if ($request->input('parent_id')) {
            $parent = Category::find($request->input('parent_id'));
            $request->merge([
                'level' => $parent->level + 1
            ]);
        }

        return $request;
    }
}
