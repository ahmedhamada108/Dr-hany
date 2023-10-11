<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\Actions\Gallery\showGalleryAction;
use App\Actions\Gallery\CreateGalleryAction;
use App\Actions\Gallery\DeleteGalleryAction;
use App\Actions\Gallery\UpdateGalleryAction;
use App\Http\Requests\GalleryRequest;

class GalleryContoller extends Controller
{
    use ResponseTrait;

    private $createGalleryAction;
    private $updateGalleryAction;
    private $deleteGalleryAction;
    private $showGalleryAction;
    public function __construct(CreateGalleryAction $createGalleryAction,UpdateGalleryAction $updateGalleryAction,DeleteGalleryAction $deleteGalleryAction,showGalleryAction $showGalleryAction){
        $this->createGalleryAction = $createGalleryAction;
        $this->updateGalleryAction = $updateGalleryAction;
        $this->deleteGalleryAction = $deleteGalleryAction;
        $this->showGalleryAction = $showGalleryAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(request()->expectsJson()){
            return $this->showGalleryAction->execute(true);
        }else{
            $gallery = $this->showGalleryAction->execute();
            return view('AdminPanel.gallery_management',compact('gallery'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $galleryRequest,CreateGalleryAction $createGalleryAction)
    {
        if(request()->expectsJson()){
            $data = $galleryRequest->validated();
            $createGalleryAction->execute($galleryRequest,$data);
            return $this->returnSuccessMessage('تم اضافة الصورة بنجاح');
        }else{
            $data = $galleryRequest->validated();
            $createGalleryAction->execute($galleryRequest,$data);
            return redirect()->route('gallery.index')->with('success','تم اضافة الصورة بنجاح');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, GalleryRequest $galleryRequest,UpdateGalleryAction $updateGalleryAction)
    {
        if(request()->expectsJson()){
            $data = $galleryRequest->validated();
            $updateGalleryAction->execute($id ,$data);
            return $this->returnSuccessMessage('تم تعديل الصورة بنجاح');
        }else{
            $data = $galleryRequest->validated();
            $updateGalleryAction->execute($id ,$data);
            return redirect()->route('gallery.index')->with('success','تم تعديل الصورة بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteGalleryAction $deleteGalleryAction)
    {
        if(request()->expectsJson()){
            $deleteGalleryAction->execute($id);
            return $this->returnSuccessMessage('تم حذف الصورة بنجاح');
        }else{
            $deleteGalleryAction->execute($id);
            return redirect()->route('gallery.index')->with('success','تم حذف الصورة بنجاح');
        }
    }

}
