<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
 
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

    // user login view
    public function userLoginIndex()
    {
        return view('login');
    }

    //user login
    public function userPostLogin(Request $request)
    {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->with('error', 'Invalid username or password entered.');
        }
    }

    // user dashboard
    public function dashboard()
    {

        // check if user logged in
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect::to("user-login")->withSuccess('Sorry! You do not have access');
    }


    // user logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('user-login');
    }

}