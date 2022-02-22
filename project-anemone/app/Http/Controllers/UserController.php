<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
 
/**
*the UserController needs to retrieve users from a data source
*here we inject a svc capable of retrieving users from the db
*note: we can swap Eloquent injector with another
*/
class UserController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;
 
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
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
}