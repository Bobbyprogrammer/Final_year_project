<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    // Single Record
    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')->join('users', 'users.id', 'class.created_by');

        if (!empty(Request::get('name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('name') . '%');
        }
        $return = $return
            ->where('class.is_delete', '=', 0)
            ->orderBy('class.id', 'desc')
            ->get();
        return $return;
    }

    // get Class
    public static function getClass()
    {
        $return = ClassModel::select('class.*')
            ->join('users', 'users.id', 'class.created_by')
            ->where('class.is_delete', '=', 0)
            ->where('class.status', '=', 0)
            ->orderBy('class.name', 'desc')
            ->get();
        return $return;
    }
}
