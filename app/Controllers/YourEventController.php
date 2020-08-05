<?php namespace App\Controllers;
use App\Models\YourEventModel;
use App\Models\CategoryModel;
use App\Models\CitiesModel;
use App\Models\UsersModel;
class YourEventController extends BaseController
{
	protected $event;
    protected $categorys;
    protected $jsons;

    public function __construct() 
    {
        $this->event = new YourEventModel();
        $this->categorys = new CategoryModel();
        $this->jsons = new CitiesModel();
    }
    
    // show your event information
	public function showYourEvent()
	{
		$data = [
            'eventData' => $this->event->getEvent(),
            "categoryData" => $this->categorys->getCategory(),
            "dataJson" => $this->jsons->getCities(),
        ];
		$user = new UsersModel();
		$data['getUser'] = $user->where('id',session()->get('id'))->first();
		
		return view('events/yourEvent',$data);
		
	}

	// create your event	
    public function createEvent() 
    {
        $categorys = $this->request->getVar('categorys');
        $title = $this->request->getVar('title');
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $start_time = $this->request->getVar('start_time');
        $end_time = $this->request->getVar('end_time');
        $description = $this->request->getVar('description');
        $city = $this->request->getVar('city');
        $file = $this->request->getFile('file_image');
        $fileName = $file->getRandomName();
            if($file->getSize()> 0)
            {
                $file->move('./images/event_image', $fileName);
            }

        $data = array(
            "cat_id" => $categorys,
            "title" => $title,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "description" => $description,
            "city" => $city,
            "image"=> $fileName,
        );

        $this->event->insert($data);
        return redirect()->to(base_url('yourEvents'));
    }

    // delete your event
    public function deleteYourEvent($event_id){
        $this->event->find($event_id);
        $this->event->delete($event_id);
        return redirect()->back();
    }

    // update your event	
    public function updateYourEvent() 
    {
        $event_id = $this->request->getVar('event_id');
        $category = $this->request->getVar('category');
        $title = $this->request->getVar('title');
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $start_time = $this->request->getVar('start_time');
        $end_time = $this->request->getVar('end_time');
        $city = $this->request->getVar('city');
        $description = $this->request->getVar('description');
        $image = $this->request->getFile('file_image');
        $fileName = $image->getRandomName();
            if($image->getSize()> 0)
            {
                $image->move('./images/event_image', $fileName);
            }
        $data = array(
            "cat_id" => $category,
            "title" => $title,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "city" => $city,
            "description" => $description,
            "image" => $fileName,
        );

        $this->event->update($event_id,$data);
        return redirect()->back();
    }
}