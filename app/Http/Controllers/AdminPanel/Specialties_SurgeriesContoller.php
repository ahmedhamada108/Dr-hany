<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\Specialties_Surgeries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return $this->showSpecialties_SurgeriesAction->execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Specialties_SurgeriesRequest $Specialties_SurgeriesRequest,CreateSpecialties_SurgeriesAction $createSpecialties_SurgeriesAction)
    {
        $data = $Specialties_SurgeriesRequest->validated();
        $createSpecialties_SurgeriesAction->execute($Specialties_SurgeriesRequest,$data);
        return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Specialties_SurgeriesRequest $Specialties_SurgeriesRequest,UpdateSpecialties_SurgeriesAction $updateSpecialties_SurgeriesAction)
    {
        $data = $Specialties_SurgeriesRequest->validated();
        $updateSpecialties_SurgeriesAction->execute($id ,$data);
        return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteSpecialties_SurgeriesAction $deleteSpecialties_SurgeriesAction)
    {
        $deleteSpecialties_SurgeriesAction->execute($id);
        return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
    }

}
