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
        if(request()->expectsJson()){
            return $this->showAwardsAction->execute(true);
        }else{
            $awards = $this->showAwardsAction->execute();
            return view('AdminPanel.Awards_management',compact('awards'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardsRequest $awardsRequest,CreateAwardsAction $createAwardsAction)
    {
        if(request()->expectsJson()){
            $data = $awardsRequest->validated();
            $createAwardsAction->execute($awardsRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $awardsRequest->validated();
            $createAwardsAction->execute($awardsRequest,$data);
            return redirect()->route('awards.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AwardsRequest $awardsRequest,UpdateAwardsAction $updateAwardsAction)
    {
        if(request()->expectsJson()){
            $data = $awardsRequest->validated();
            $updateAwardsAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $awardsRequest->validated();
            $updateAwardsAction->execute($id ,$data);
            return redirect()->route('awards.index')->with('success','تم تعديل الصورة بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteAwardsAction $deleteAwardsAction)
    {
        if(request()->expectsJson()){
            $deleteAwardsAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteAwardsAction->execute($id);
            return redirect()->route('awards.index')->with('success','تم حذف الصورة بنجاح');
        }
    }

}
