<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\AdminRequest;
use App\Actions\Admin\showAdminAction;
use App\Actions\Admin\CreateAdminAction;
use App\Actions\Admin\DeleteAdminAction;
use App\Actions\Admin\UpdateAdminsAction;
use App\Http\Requests\AdminsRequest;

use Illuminate\Routing\Controller as Controller;

class AdminsContoller extends Controller
{
    use ResponseTrait;

    private $createAdminAction;
    private $updateAdminAction;
    private $deleteAdminAction;
    private $showAdminAction;
    
    public function __construct(CreateAdminAction $createAdminAction,UpdateAdminsAction $updateAdminAction,DeleteAdminAction $deleteAdminAction,showAdminAction $showAdminAction){
        $this->createAdminAction = $createAdminAction;
        $this->updateAdminAction = $updateAdminAction;
        $this->deleteAdminAction = $deleteAdminAction;
        $this->showAdminAction = $showAdminAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(request()->expectsJson()){
            return $this->showAdminAction->execute(true);
        }else{
            $admins = $this->showAdminAction->execute();
            return view('AdminPanel.Admins_management',compact('admins'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminsRequest $adminRequest,CreateAdminAction $createAdminAction)
    {
        if(request()->expectsJson()){
            $data = $adminRequest->validated();
            $createAdminAction->execute($adminRequest,$data);
            return $this->returnSuccessMessage('تم اضافة المسؤول بنجاح');
        }else{
            $data = $adminRequest->validated();
            $createAdminAction->execute($adminRequest,$data);
            return redirect()->route('admins.index')->with('success','تم اضافة المسؤول بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AdminsRequest $adminRequest,UpdateAdminsAction $updateAdminsAction)
    {
        if(request()->expectsJson()){
            $data = $adminRequest->validated();
            $updateAdminsAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل المسؤول بنجاح');
        }else{
            $data = $adminRequest->validated();
            $updateAdminsAction->execute($id ,$data);
            return redirect()->back()->with('success','تم تعديل المسؤول بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteAdminAction $deleteAdminAction)
    {
        if(request()->expectsJson()){
            if($id == auth('admin')->user()->id){
                return $this->returnError('E420','لا يمكن حذف المسؤول الحالي');
            }
            $deleteAdminAction->execute($id);
            return $this->returnSuccessMessage('تم حذف المسؤول بنجاح');
        }else{
            if($id == auth('admins')->user()->id){
                return redirect()->route('admins.index')->with('error','لا يمكن حذف المسؤول الحالي');
            }
            $deleteAdminAction->execute($id);
            return redirect()->route('admins.index')->with('success','تم حذف المسؤول بنجاح');
        }
    }

}
