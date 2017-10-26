<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends BaseModel
{
    protected $table = "categories";

    protected $fillable = [
        'parent_id', 'name', 'status', 'deleted'
    ];

    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'name' => [
            'label' => 'Name',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'parent_id' => [
            'label' => 'Parent_id',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text'
            ]
        ],
        'status' => [
            'label' => 'Status',
            'default' => true,
            'search' => [
                'type' => 'selectbox',
                'placeholder' => '---',
                'data' => \App\AppConst\Constants::STATUS
            ]
        ]
    ];

    public $timestamps = true;

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


    /**
     * @return array
     * @uses Return array tree department
     */
    public function getCategoryTree()
    {
        $array = [];
        $array[0] = "Choose parent";
        $categories = $this->where('categories.deleted', '=', 0)->get();
        if ($categories) {
            foreach ($categories as $key => $value) {
                if ($value->parent_id == 0) {
                    $disabled = $value->status ? false : true;
                    $array[$value->id] = [$value->id => $value->name, 'disabled' => $disabled];
                    $parentIDOrg = $value->id;
                    $array = $this->getParent($categories, $parentIDOrg, $array, "--");
                }
            }
        }
        return $array;
    }

    private function getParent($categories, $parentIdOrg, $array, $flag)
    {
        $data = [];
        foreach ($categories as $k => $v) {
            if ($v->parent_id == $parentIdOrg) {
                $data[$k] = $v;
//                dd($v);
            }
        }
        foreach ($data as $key => $rs) {
            $disabled = $rs->status ? false : true;
            $array[$rs->id] = ['name' => $flag . $rs->name, 'disabled' => $disabled];;
            $parentIdOrganization = $rs->id;
            $array = $this->getParent($categories, $parentIdOrganization, $array, $flag . '--');
        }
        return $array;
    }

    /**
     * @return bool
     * @uses validate department contraint data
     */
    public function validateContraintsData()
    {
        // Check has more than 0 children dp and not deleted
        $child = $this->children()->where(['deleted' => 0])->get()->toArray();

        // Check has more than 0 member and not deleted
        $member = $this->new_category()->get()->toArray();
        if ($member || $child) {
            return false;
        }
        return true;
    }

    /**
     * @param $query
     * @return \Illuminate\Http\RedirectResponse
     * Check delete has no constraints
     */

    public function scopeAvailableCategories($query, $params)
    {
//        dd(11);
        $query->where('deleted', false);
        if (isset($params['sort']) && $params['sort']) {
            $key = strtolower(array_keys(getSort())[0]);
            if (array_key_exists($key, $this->searchAble)) {
                unset($params['sort']);
                $query = $query->orderBy("categories." . $key, getSort($key));
            }
        }
        if (isset($params['parent_org']) && $params['parent_org']) {
            $query = $query->select('categories.*')->join('categories as d', 'categories.parent_id', '=', 'd.id')
                ->where('d.name', 'LIKE', "%" . $params['parent_org'] . "%");
        }
        return $query;
    }
}
