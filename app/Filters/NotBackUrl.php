<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NotBackUrl implements FilterInterface
{   
    // user cannot back url
    public function before(RequestInterface $request)
    {
        if(session()->get('isLoggedIn')){
            return redirect()->to('/yourEvents');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}