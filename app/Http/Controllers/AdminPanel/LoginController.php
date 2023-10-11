<?php

namespace App\Http\Controllers\AdminPanel;

use App\Actions\Admin\LoginAction;
use Illuminate\Routing\Controller as Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\feedback;
use App\Models\medical_services;
use App\Models\Specialties_Surgeries;

class LoginController extends Controller
{
    use ResponseTrait;

    public function showLoginForm()
    {
        return view('AdminPanel.login');
    }
    public function login(LoginRequest $request, LoginAction $adminLogin)
    {
        $credentials = $request->only('email', 'password');
        $token = $adminLogin->execute($credentials, $request->is('api/*'));
        $Admin = auth('admin')->user();
        if($request->is('api/*')){
            if($Admin){
                $Admin->token = $token;
                return $this->returnData('Data', $Admin);
            }else{
                return $this->returnErrorNotAuthenticate('401', 'البيانات خاطئة');
            }
        }else{
            if($Admin){
                auth('admins')->login($Admin);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error','البيانات خاطئة');
            }
        }
    }
    public function logout()
    {
        auth('admins')->logout();
        return redirect()->route('admin.login');
    }
    public function Dashboard()
    {
        $specialties_surgery = Specialties_Surgeries::count();
        $medical_services = medical_services::count();
        $Feedback = feedback::count();
        return view('AdminPanel.dashboard',compact(['specialties_surgery','medical_services','Feedback']));
    }


}

?>