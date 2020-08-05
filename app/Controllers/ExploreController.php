<?php namespace App\Controllers;
use App\Models\YourEventModel;
use App\Models\CategoryModel;
use App\Models\CitiesModel;
use App\Models\UsersModel;
class ExploreController extends BaseController
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
    public function showExplore()
	{
		$data = [
            'eventData' => $this->event->getEvent(),
            "categoryData" => $this->categorys->getCategory(),
            "dataJson" => $this->jsons->getCities(),
		];
		$user = new UsersModel();
		$data['getUser'] = $user->where('id',session()->get('id'))->first();
        return view('events/exploreEvent',$data);

	}
}