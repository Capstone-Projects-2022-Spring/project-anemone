<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
/**
*the UserController needs to retrieve users from a data source
*where we inject a svc capable of retrieving users from the db
*note: we can swap Eloquent injector with another
*/
class UserController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var User
     */
    protected $users;
 
    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }
 
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);
 
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Show a list of all of the application's users.
     * the second parameter is anything that needs to bind to a query.
     * Typically these are the values of the where clause constraints.
     * select() will always return an array of results containing stdClass obj representing records from the db.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users where active = ?', [1]);
 
        return view('user.index', ['users' => $users]);
    }

    public function select_user_by_name()
    {
        $users = DB::select('select * from users');
 
        foreach ($users as $user) {
            echo $user->name;

        }
    }

    // public function get_username()
    // {
    //     $username=$_REQUEST['username'];
    //     $users = DB::select('select * from users where name = ?', [$username]);
 
    //     foreach ($users as $user) {
    //         echo $user->username;

    //     }
    // }

    public function update_user_by_username()
    {
        $username=$_REQUEST['username'];
        $id=$_REQUEST['id'];
        $users = DB::select('select * from users where id = ?', [$id]);
        foreach($users as $user){
            User::insert([
                ['username'=>$username]
            ]);
        }
    }

    public function create_user(){
        $email=$_REQUEST['email'];
        $name=$_REQUEST['name'];
        $password=$_REQUEST['password'];
        $date_joined=$_REQUEST[SQL_TIMESTAMP];

        User::insert([
            ['email'=>$email, 'name'=>$name,'password'=>$password,'date_joined'=>$date_joined]
        ]);
    }

    public function create_user_array(){
        $email=$_REQUEST['email'];
        $name=$_REQUEST['name'];
        $password=$_REQUEST['password'];
        $date_joined=$_REQUEST[SQL_TIMESTAMP];

        DB::table('users')->insert([
            ['email'=>$email, 'name'=>$name,'password'=>$password,'date_joined'=>$date_joined]
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('index');;
    }

    public function delete_user(){
        $username=$_REQUEST['username'];
        $user = DB::select('select * from users where username = ?', [$username]);
        DB::table('users')->delete([
            [$user]
        ]);
    }


}