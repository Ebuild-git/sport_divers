<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class EventController extends BaseController

{
    public function events()
    {
    $data = Event::paginate(10);
        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => "Aucun évènement  trouvé.",
                'data' => []
            ]);
        }

        return $this->getResponse($data, "Tous les évènements ");


}

}
