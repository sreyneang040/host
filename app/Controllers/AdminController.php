<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\CitiesModel;
use App\Models\UsersModel;
class AdminController extends BaseController
{

	public function showCategory()
	{
        $model = new CitiesModel();
		$json = $model->getCities();
        $data['dataJson'] = $json;
		$model = new CategoryModel();
        $data['showCategory'] = $model->findAll();
        $user = new UsersModel();
		$data['getUser'] = $user->where('id',session()->get('id'))->first();
		return view('manages/category',$data);
	}

	public function insertCategory() 
    {
        
        helper(['form']);
        $data = [];
        if($this->request->getMethod()== "post") {
            $rules = [
                'name'=> [
                    'rules' => 'required|is_unique[categorys.name]',
                    'errors'=>[
                        'required'=> 'The Category name field is required.',
                        'is_unique' => 'The Category already exists.',
                    ]  
                ],
                
            ];
            if($this->validate($rules)) {
				$model = new CategoryModel();
                $categorys = $this->request->getVar('name');
                $data = array(
                    'name' => $categorys
                );
            
				$model->insert($data);
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful create category');
                return redirect()->to("/category");
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to(base_url('/category'));
            }
        }
    }
		//   Delete Category
	public function deleteCategory()
	{
		$model = new CategoryModel();
		$id = $this->request->getVar('delete_id');
		$model->delete($id);
		return redirect()->to(base_url('/category'));
	}

	// Update Category
	public function update()
    {
		helper(['form']);
		$model = new CategoryModel();
		$id = $this->request->getVar('id');
			
		
		if($this->request->getMethod()== "post") {
            $rules = [
                'name'=> [
                    'rules' => 'required|is_unique[categorys.name]',
                    'errors'=>[
                        'required'=> 'The category name field is required.',
                        'is_unique' => 'The category already exists.',
                    ]  
                ],
                
            ];
            if($this->validate($rules)) {
				$model = new CategoryModel();
                $categorys = $this->request->getVar('name');
                $id = $this->request->getVar('update_id');
                $data = array(
                    'name' => $categorys
                );
            
				$model->update($id,$data);
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful update category');
                return redirect()->to("/category");
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to(base_url('/category'));
            }
        }
	}
}