<?php
namespace App\Models;
use Request;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // Get Students
    static function getStudent()
    {
        $return = self::select('users.*','class.name as class_name','teacher.name as teacher_name')
        ->join('users as teacher','teacher.id','=','users.teacher_id','left')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }
        $return = $return->orderBy('users.id', 'desc')->get();

        return $return;
    }

    // Get Students for the Assigining to the Teacher
   
    static public  function getSearchStudent()
    {
if(!empty(Request::get('name')) || !empty(Request::get('email'))){

    $return = self::select('users.*','class.name as class_name','teacher.name as teacher_name')
    ->join('users as teacher','teacher.id','=','users.teacher_id')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }
        $return = $return->orderBy('users.id', 'desc')->limit(50)->get();

        return $return;
}
    }

static public function getMyStudent($teacher_id){

$return = self::select('users.*','class.name as class_name','teacher.name as teacher_name')
->join('users as teacher','teacher.id','=','users.teacher_id')
        ->join('class', 'class.id', '=', 'users.class_id', 'left')
        ->where('users.user_type', '=', 3)
        ->where('users.teacher_id', '=', $teacher_id)
        ->where('users.is_delete', '=', 0)
   
   ->orderBy('users.id', 'desc')->get();

    return $return;
}



    //single  by id

    public static function getSingle($id)
    {
        return self::find($id);
    }

    static function getAdmin()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        $return = $return->orderBy('id', 'desc')->get();

        return $return;
    }

    public static function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    public static function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    public static function getTeacher()
    {
        $return = self::select('users.*')
            ->where('users.user_type', '=', 2)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }
        $return = $return->orderBy('users.id', 'desc')->get();

        return $return;
    }
}
