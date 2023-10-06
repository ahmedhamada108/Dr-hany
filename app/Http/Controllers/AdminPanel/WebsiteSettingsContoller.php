<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\ResponseTrait;
use Illuminate\Routing\Controller as Controller;
use App\Actions\WebsiteSettings\showWebsiteSettingsAction;
use App\Actions\WebsiteSettings\UpdateWebsiteSettingsAction;
use App\Http\Requests\WebisteSettingsRequest;

class WebsiteSettingsContoller extends Controller
{
    use ResponseTrait;

    private $updateWebsiteSettingsAction;
    private $showWebsiteSettingsAction;
    public function __construct(UpdateWebsiteSettingsAction $updateWebsiteSettingsAction,showWebsiteSettingsAction $showWebsiteSettingsAction){
        $this->updateWebsiteSettingsAction = $updateWebsiteSettingsAction;
        $this->showWebsiteSettingsAction = $showWebsiteSettingsAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->showWebsiteSettingsAction->execute();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WebisteSettingsRequest $webisteSettingsRequest,UpdateWebsiteSettingsAction $updateWebsiteSettingsAction)
    {
        $data = $webisteSettingsRequest->validated();
        $updateWebsiteSettingsAction->execute($data);
        return $this->returnSuccessMessage('تم تعديل البيانات بنجاح');
    }

}
