<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class RateLimitFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $throttler = Services::throttler();

        // Limit to 5 requests per minute for login/contact
        if ($throttler->check(md5($request->getIPAddress()), 5, MINUTE) === false) {
            return Services::response()->setStatusCode(429)->setBody('Too Many Requests. Please try again later.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
