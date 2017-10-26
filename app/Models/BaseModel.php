<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\AppConst\Constants;
class BaseModel extends Model
{
    protected $searchAble = [];
    /**
     * @return array
     * @uses return searchable column and info
     */
    public function getSearchAbleField()
    {
        return $this->searchAble;
    }
    /**
     * @param $searchRemmember
     * @uses get search fields
     */
    public function getSearch($searchRemmember){
        if (session($searchRemmember) && count(session($searchRemmember)) > 1) {
            $searchFields = session($searchRemmember);
            $this->searchAble = array_filter($this->searchAble, function($key) use ($searchFields) {
                return in_array($key, $searchFields);
            }, ARRAY_FILTER_USE_KEY);
        } else {
            $this->searchAble = array_filter($this->searchAble, function($val, $key){
                return $val['default'] == true;
            }, ARRAY_FILTER_USE_BOTH);
        }
    }
    /**
     * @param $query
     * @param $params
     * @return query
     * @uses search result by params
     */
    public function scopeSearch($query, $params)
    {
        $tableModel = $query->getModel()->getTable();
        foreach ($this->getSearchAbleField() as $key => $value) {
            if (isset($params[$key])) {
                switch ($value['search']['type']) {
                    case 'selectbox' :
                        $query->where($tableModel . '.' . $key, '=', $params[$key]);
                        break;
                    case 'date' :
                        $date = Carbon::createFromFormat(Constants::JP_DATE_FORMAT, $params[$key])->format('Y-m-d');
                        if ($date) {
                            $query->whereDate($tableModel . '.' . $key, $date);
                        }
                        break;
                    default:
                        $query->where($tableModel . '.' . $key, 'LIKE', '%' . $params[$key] . '%');
                        break;
                }
            }
        }
        return $query;
    }
    public function getDateFields()
    {
        return $this->dates;
    }
    /**
     * @use generate new code for hotel and reserve
     */
    public function generateCode(): string
    {
        $rs = $this->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->orderBy('id', 'DESC')->first();
        $num = 1;
        if ($rs) {
            $num = intval(substr($rs->code, -6)) + 1;
        }
        return date('y') . str_pad(date('m'), 2, '0') . str_pad($num, 6, '0', STR_PAD_LEFT);
    }
}