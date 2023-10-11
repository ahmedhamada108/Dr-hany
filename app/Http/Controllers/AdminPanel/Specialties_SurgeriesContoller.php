<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\Specialties_Surgeries;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\Actions\Specialties_Surgeries\showSpecialties_SurgeriesAction;
use App\Actions\Specialties_Surgeries\CreateSpecialties_SurgeriesAction;
use App\Actions\Specialties_Surgeries\DeleteSpecialties_SurgeriesAction;
use App\Actions\Specialties_Surgeries\UpdateSpecialties_SurgeriesAction;
use App\Http\Requests\Specialties_SurgeriesRequest;

class Specialties_SurgeriesContoller extends Controller
{
    use ResponseTrait;

    private $createSpecialties_SurgeriesAction;
    private $updateSpecialties_SurgeriesAction;
    private $deleteSpecialties_SurgeriesAction;
    private $showSpecialties_SurgeriesAction;
    public function __construct(CreateSpecialties_SurgeriesAction $createSpecialties_SurgeriesAction,UpdateSpecialties_SurgeriesAction $updateSpecialties_SurgeriesAction,DeleteSpecialties_SurgeriesAction $deleteSpecialties_SurgeriesAction,showSpecialties_SurgeriesAction $showSpecialties_SurgeriesAction){
        $this->createSpecialties_SurgeriesAction = $createSpecialties_SurgeriesAction;
        $this->updateSpecialties_SurgeriesAction = $updateSpecialties_SurgeriesAction;
        $this->deleteSpecialties_SurgeriesAction = $deleteSpecialties_SurgeriesAction;
        $this->showSpecialties_SurgeriesAction = $showSpecialties_SurgeriesAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(request()->expectsJson()){
            return $this->showSpecialties_SurgeriesAction->execute(true);
        }else{
            $Specialties_Surgeries = $this->showSpecialties_SurgeriesAction->execute();
            return view('AdminPanel.Specialties_Surgeries_management',compact('Specialties_Surgeries'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Specialties_SurgeriesRequest $Specialties_SurgeriesRequest,CreateSpecialties_SurgeriesAction $createSpecialties_SurgeriesAction)
    {
        if(request()->expectsJson()){
            $data = $Specialties_SurgeriesRequest->validated();
            $createSpecialties_SurgeriesAction->execute($Specialties_SurgeriesRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $Specialties_SurgeriesRequest->validated();
            $createSpecialties_SurgeriesAction->execute($Specialties_SurgeriesRequest,$data);
            return redirect()->route('Specialties_Surgeries.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Specialties_SurgeriesRequest $Specialties_SurgeriesRequest,UpdateSpecialties_SurgeriesAction $updateSpecialties_SurgeriesAction)
    {
        if(request()->expectsJson()){
            $data = $Specialties_SurgeriesRequest->validated();
            $updateSpecialties_SurgeriesAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $Specialties_SurgeriesRequest->validated();
            $updateSpecialties_SurgeriesAction->execute($id ,$data);
            return redirect()->route('Specialties_Surgeries.index')->with('success','تم تعديل الصورة بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteSpecialties_SurgeriesAction $deleteSpecialties_SurgeriesAction)
    {
        if(request()->expectsJson()){
            $deleteSpecialties_SurgeriesAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteSpecialties_SurgeriesAction->execute($id);
            return redirect()->route('Specialties_Surgeries.index')->with('success','تم حذف الصورة بنجاح');
        }
    }

}
