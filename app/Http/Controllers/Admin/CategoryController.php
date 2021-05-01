<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showAll()
    {
        $data = [
            'categories' => (new Category())->all(),
            'pageTitle' => 'Категории новостей',
        ];

        return view('admin.allCategories', $data);
    }

    public function showCreateForm()
    {
        $data = [
            'pageTitle' => 'Создание категории',
        ];

        return view('admin.createCategoryForm', $data);
    }

    public function create(CreateCategoryRequest $request)
    {
        $category = (new Category())->fill($request->all());
        $category->save();

        return back()->with('createMsg', 'Категория добавлена');
    }

    public function showEditForm($id)
    {
        $data = [
            'pageTitle' => 'Редактирование категории',
            'category' => (new Category())->find($id),
        ];

        return view('admin.editCategoryForm', $data);
    }

    public function edit(CreateCategoryRequest $request, $id)
    {
        $category = (new Category())->fill($request->all());
        $category->save();

        return back()->with('editMsg', 'Изменения сохранены')->withInput();
    }
        

    public function delete($id)
    {
        Category::destroy($id);

        return back(); 
    }
}
