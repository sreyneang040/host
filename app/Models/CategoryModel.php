<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categorys';
    protected $primaryKey = 'category_id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name'];

    public function getCategory() 
    {
        return $this->db->table('categorys')->get()->getResultArray();
    }

}