<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\Actions\FeedBack\showFeedBackAction;
use App\Actions\FeedBack\CreateFeedBackAction;
use App\Actions\FeedBack\DeleteFeedBackAction;
use App\Actions\FeedBack\UpdateFeedBackAction;
use App\Http\Requests\FeedBackRequest;

class FeedBackContoller extends Controller
{
    use ResponseTrait;

    private $createFeedBackAction;
    private $updateFeedBackAction;
    private $deleteFeedBackAction;
    private $showFeedBackAction;
    public function __construct(CreateFeedBackAction $createFeedBackAction,UpdateFeedBackAction $updateFeedBackAction,DeleteFeedBackAction $deleteFeedBackAction,showFeedBackAction $showFeedBackAction){
        $this->createFeedBackAction = $createFeedBackAction;
        $this->updateFeedBackAction = $updateFeedBackAction;
        $this->deleteFeedBackAction = $deleteFeedBackAction;
        $this->showFeedBackAction = $showFeedBackAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->expectsJson()){
            return $this->showFeedBackAction->execute(true);
        }else{
            $feedback = $this->showFeedBackAction->execute();
            return view('AdminPanel.FeedBack_management',compact('feedback'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedBackRequest $feedbackRequest,CreateFeedBackAction $createFeedBackAction)
    {
        if(request()->expectsJson()){
            $data = $feedbackRequest->validated();
            $createFeedBackAction->execute($feedbackRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $feedbackRequest->validated();
            $createFeedBackAction->execute($feedbackRequest,$data);
            return redirect()->route('feedback.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, FeedBackRequest $feedbackRequest,UpdateFeedBackAction $updateFeedBackAction)
    {
        if(request()->expectsJson()){
            $data = $feedbackRequest->validated();
            $updateFeedBackAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $feedbackRequest->validated();
            $updateFeedBackAction->execute($id ,$data);
            return redirect()->route('feedback.index')->with('success','تم تعديل الصورة بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteFeedBackAction $deleteFeedBackAction)
    {
        if(request()->expectsJson()){
            $deleteFeedBackAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteFeedBackAction->execute($id);
            return redirect()->route('feedback.index')->with('success','تم حذف الصورة بنجاح');
        }
    }

}
