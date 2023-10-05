<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        //
        return $this->showFeedBackAction->execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedBackRequest $feedbackRequest,CreateFeedBackAction $createFeedBackAction)
    {
        $data = $feedbackRequest->validated();
        $createFeedBackAction->execute($feedbackRequest,$data);
        return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, FeedBackRequest $feedbackRequest,UpdateFeedBackAction $updateFeedBackAction)
    {
        $data = $feedbackRequest->validated();
        $updateFeedBackAction->execute($id ,$data);
        return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteFeedBackAction $deleteFeedBackAction)
    {
        $deleteFeedBackAction->execute($id);
        return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
    }

}
