<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Auth;
use DB;
use Artisan;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function index()
    {
        return view('auth.login');
    }

    public function process_login(Request $request)
    {

        try
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->except(['_token']);

            
            if (auth()->attempt($credentials)) 
            {
                $PermissionName=['Dashboard','GatePassManagement','GatePass','DataSetup','Transporter','Driver','Vehicle','Warehouse','Product','Location','Administrator','User','UserRole','ChangePassword'];
                $count=count($PermissionName);
                $UserId = Auth::user()->id;
                $UseroleId = Auth::user()->UserRoleId;
                
                $request->session()->put('FirstName',Auth::user()->FirstName);
                $request->session()->put('LastName',Auth::user()->LastName);
                $request->session()->put('email',Auth::user()->email);
                $request->session()->put('EmailID',Auth::user()->EmailId);
                $UserRoleName=DB::table('user_roles')->select('UserRoleName')->where('id',$UseroleId)->get();
                $name_u=$UserRoleName[0]->UserRoleName;
                
                $request->session()->put('Endel','hey');
                for($i=0;$i<$count;$i++) 
                {
                    $Permission_Name = $PermissionName[$i];
                    $userrole_permissions = DB::table('userrole_permission as up')
                                            ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
                                            ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
                                            ->select('up.*')
                                            ->where([['u.id', '=', $UserId],['p.permissionName', '=', $Permission_Name]])
                                            ->first();

                    $Permission_ID=$userrole_permissions->PermissionId;

                    
                    $permissionName=DB::table('permissions')->select('permissionName')->where('id',$Permission_ID)->first();

                    if ($userrole_permissions->IsRead == 0)
                    {
                      $request->session()->put($permissionName->permissionName,'hii');
                    }  
                }
                 $request->session()->flash('status', 'Login successful!'); // Flash success message
                return redirect()->route('home');
            }
            else
            {
                session()->flash('message', 'Invalid credentials');
                return redirect()->back();
            }
        }
        catch (\Exception $exception) 
        {
            return back()->withError('Database Not Connected.Please Cheack!!')->withInput(); 
        }    
        
    }


    public function logout(Request $request)
    {
        Session::flush();
        $request->session()->flush();
        $request->session()->forget('user','hey');
        Auth::logout();
        return redirect()->route('login');

    }

}
