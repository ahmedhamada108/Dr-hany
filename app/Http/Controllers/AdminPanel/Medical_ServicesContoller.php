<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\medical_services;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\Actions\Medical_Services\showMedical_ServicesAction;
use App\Actions\Medical_Services\CreateMedical_ServicesAction;
use App\Actions\Medical_Services\DeleteMedical_ServicesAction;
use App\Actions\Medical_Services\UpdateMedical_ServicesAction;
use App\Http\Requests\Medical_ServicesRequest;

class Medical_ServicesContoller extends Controller
{
    use ResponseTrait;

    private $createMedical_ServicesAction;
    private $updateMedical_ServicesAction;
    private $deleteMedical_ServicesAction;
    private $showMedical_ServicesAction;
    public function __construct(CreateMedical_ServicesAction $createMedical_ServicesAction,UpdateMedical_ServicesAction $updateMedical_ServicesAction,DeleteMedical_ServicesAction $deleteMedical_ServicesAction,showMedical_ServicesAction $showMedical_ServicesAction){
        $this->createMedical_ServicesAction = $createMedical_ServicesAction;
        $this->updateMedical_ServicesAction = $updateMedical_ServicesAction;
        $this->deleteMedical_ServicesAction = $deleteMedical_ServicesAction;
        $this->showMedical_ServicesAction = $showMedical_ServicesAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(request()->expectsJson()){
            return $this->showMedical_ServicesAction->execute(true);
        }else{
            $medical_services = $this->showMedical_ServicesAction->execute();
            return view('AdminPanel.medical_services_management',compact('medical_services'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Medical_ServicesRequest $medical_servicesRequest,CreateMedical_ServicesAction $createMedical_ServicesAction)
    {
        if(request()->expectsJson()){
            $data = $medical_servicesRequest->validated();
            $createMedical_ServicesAction->execute($medical_servicesRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $medical_servicesRequest->validated();
            $createMedical_ServicesAction->execute($medical_servicesRequest,$data);
            return redirect()->route('medical_services.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update($id, Medical_ServicesRequest $medical_servicesRequest,UpdateMedical_ServicesAction $updateMedical_ServicesAction)
    {
        if(request()->expectsJson()){
            $data = $medical_servicesRequest->validated();
            $updateMedical_ServicesAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $medical_servicesRequest->validated();
            $updateMedical_ServicesAction->execute($id ,$data);
            return redirect()->route('medical_services.index')->with('success','تم تعديل الصورة بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteMedical_ServicesAction $deleteMedical_ServicesAction)
    {
        if(request()->expectsJson()){
            $deleteMedical_ServicesAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteMedical_ServicesAction->execute($id);
            return redirect()->route('medical_services.index')->with('success','تم حذف الصورة بنجاح');
        }
    }

}
