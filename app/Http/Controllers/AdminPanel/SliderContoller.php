<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\Actions\Slider\showSliderAction;
use App\Actions\Slider\CreateSliderAction;
use App\Actions\Slider\DeleteSliderAction;
use App\Actions\Slider\UpdateSliderAction;
use App\Http\Requests\SliderRequest;

class SliderContoller extends Controller
{
    use ResponseTrait;

    private $createSliderAction;
    private $updateSliderAction;
    private $deleteSliderAction;
    private $showSliderAction;
    public function __construct(CreateSliderAction $createSliderAction,UpdateSliderAction $updateSliderAction,DeleteSliderAction $deleteSliderAction,showSliderAction $showSliderAction){
        $this->createSliderAction = $createSliderAction;
        $this->updateSliderAction = $updateSliderAction;
        $this->deleteSliderAction = $deleteSliderAction;
        $this->showSliderAction = $showSliderAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->expectsJson()) {
            return $this->showSliderAction->execute(true);
        }else{
            $sliders = $this->showSliderAction->execute();
            return view('AdminPanel.slider_management',compact('sliders'));
            // return $sliders;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $sliderRequest,CreateSliderAction $createSliderAction)
    {
        if(request()->expectsJson()){
            $data = $sliderRequest->validated();
            $createSliderAction->execute($sliderRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $sliderRequest->validated();
            $createSliderAction->execute($sliderRequest,$data);
            return redirect()->route('slider.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, SliderRequest $sliderRequest,UpdateSliderAction $updateSliderAction)
    {
        if(request()->expectsJson()){
            $data = $sliderRequest->validated();
            $updateSliderAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $sliderRequest->validated();
            $updateSliderAction->execute($id ,$data);
            return redirect()->route('slider.index')->with('success','تم تعديل الصورة بنجاح');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteSliderAction $deleteSliderAction)
    {
        if(request()->expectsJson()){
            $deleteSliderAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteSliderAction->execute($id);
            return redirect()->route('slider.index')->with('success','تم حذف الصورة بنجاح');
        }

    }

}
