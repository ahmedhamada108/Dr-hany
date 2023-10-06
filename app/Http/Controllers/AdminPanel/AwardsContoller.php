<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\slider;
use Illuminate\Http\Request;
use App\Actions\Awards\showAwardsAction;
use App\Actions\Awards\CreateAwardsAction;
use App\Actions\Awards\DeleteAwardsAction;
use App\Actions\Awards\UpdateAwardsAction;
use App\Http\Requests\AwardsRequest;
use Illuminate\Routing\Controller as Controller;

class AwardsContoller extends Controller
{
    use ResponseTrait;

    private $createAwardsAction;
    private $updateAwardsAction;
    private $deleteAwardsAction;
    private $showAwardsAction;
    
    public function __construct(CreateAwardsAction $createAwardsAction,UpdateAwardsAction $updateAwardsAction,DeleteAwardsAction $deleteAwardsAction,showAwardsAction $showAwardsAction){
        $this->createAwardsAction = $createAwardsAction;
        $this->updateAwardsAction = $updateAwardsAction;
        $this->deleteAwardsAction = $deleteAwardsAction;
        $this->showAwardsAction = $showAwardsAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->showAwardsAction->execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardsRequest $awardsRequest,CreateAwardsAction $createAwardsAction)
    {
        $data = $awardsRequest->validated();
        $createAwardsAction->execute($awardsRequest,$data);
        return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AwardsRequest $awardsRequest,UpdateAwardsAction $updateAwardsAction)
    {
        $data = $awardsRequest->validated();
        $updateAwardsAction->execute($id ,$data);
        return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteAwardsAction $deleteAwardsAction)
    {
        $deleteAwardsAction->execute($id);
        return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
    }

}
