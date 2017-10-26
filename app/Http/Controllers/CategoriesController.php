<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;

class CategoriesController extends BaseController
{
    public function index()
    {
        $model = new Categories();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_categories_remember');
        $params = request()->input();
        $category = $model->with('parent')->availableCategories($params);
        $parent = $model->children();
        $category = $category->search($params);
        $category = $category->orderBy('categories.id', 'desc');
        $category = $category->paginate($this->limit);
        $this->view(['searchField' => $searchField, 'pages' => $category, 'listField' => $category, 'parent' => $parent]);
    }

    public function setting(Request $request)
    {
        $category = $request->input();
        $category = array_keys($category);
        session(['search_category_remember' => $category]);
        return redirect()->to('categories');
    }

    public function form($id = null)
    {
        $category = new Categories();
        if ($id) {
            $category = Categories::findOrFail($id);
        }
        if (old()) {
            $category->fill(old());
        }
        (request()->session()->has('categoriesConfirm') && request()->query('back') == 'true') ? $category = request()->session()->get('categoriesConfirm') : request()->session()->forget('categoriesConfirm');
        $category->id = $id;
        $parentOrganization = $category->getCategoryTree();
        $this->view(['category' => $category, 'parentOrg' => $parentOrganization]);
    }

    public function confirm(CategoryRequest $request)
    {
        $category = new Categories();
        $category->fill($request->input());
        if ($request->input('id')) {
            $category->id = $request->input('id');
        }
        if ($request->input('status') == 0 && !$category->validateContraintsData())
        {
            return redirect($this->getRedirectUrl())->with('status_error', 'Item has relation data')->withInput($request->all());
        }
        $request->session()->put('categoriesConfirm', $category);
        $this->view(['category' => $category]);
    }

    public function complete()
    {
//dd(11);
        if (!request()->session()->has('categoriesConfirm')) {
            return redirect(route('categories.index'));
        }
        $categoriesConfirm = request()->session()->get('categoriesConfirm');

        if ($categoriesConfirm->id) {
            $categoriesConfirm->exists = true;
        }
        $categoriesConfirm->save();
        request()->session()->forget('categoriesConfirm');
        $this->view();
    }

    public function delete()
    {
        $this->model = 'App\Models\Categories';

        return parent::delete();
    }



}
