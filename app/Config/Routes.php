<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');
$routes->get('maintenance', 'Home::maintenance');

// --- ADMIN ROUTES ---
$routes->group('admin', function($routes) {
    // Auth (Guest)
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('login', 'Admin\Auth::attemptLogin', ['filter' => 'ratelimit']);
    $routes->get('logout', 'Admin\Auth::logout');
    $routes->get('forgot-password', 'Admin\Auth::forgotPassword');
    $routes->post('forgot-password', 'Admin\Auth::attemptForgotPassword');
    $routes->get('reset-password/(:any)', 'Admin\Auth::resetPassword/$1');
    $routes->post('reset-password', 'Admin\Auth::attemptResetPassword');

    // Dashboard & Modules (Auth Required)
    $routes->group('', ['filter' => 'auth'], function($routes) {
        $routes->get('/', 'Admin\Dashboard::index');
        $routes->get('dashboard', 'Admin\Dashboard::index');

        // Services
        $routes->group('services', function($routes) {
            $routes->get('/', 'Admin\ServiceController::index');
            $routes->get('new', 'Admin\ServiceController::new');
            $routes->post('create', 'Admin\ServiceController::create');
            $routes->get('edit/(:num)', 'Admin\ServiceController::edit/$1');
            $routes->post('update/(:num)', 'Admin\ServiceController::update/$1');
            $routes->delete('delete/(:num)', 'Admin\ServiceController::delete/$1');
        });

        // Portfolios
        $routes->group('portfolios', function($routes) {
            $routes->get('/', 'Admin\PortfolioController::index');
            $routes->get('new', 'Admin\PortfolioController::new');
            $routes->post('create', 'Admin\PortfolioController::create');
            $routes->get('edit/(:num)', 'Admin\PortfolioController::edit/$1');
            $routes->post('update/(:num)', 'Admin\PortfolioController::update/$1');
            $routes->delete('delete/(:num)', 'Admin\PortfolioController::delete/$1');
        });

        // Blog
        $routes->group('blog', function($routes) {
            $routes->get('posts', 'Admin\BlogPostController::index');
            $routes->get('posts/new', 'Admin\BlogPostController::new');
            $routes->post('posts/create', 'Admin\BlogPostController::create');
            $routes->get('posts/edit/(:num)', 'Admin\BlogPostController::edit/$1');
            $routes->post('posts/update/(:num)', 'Admin\BlogPostController::update/$1');
            $routes->delete('posts/delete/(:num)', 'Admin\BlogPostController::delete/$1');

            $routes->get('categories', 'Admin\BlogCategoryController::index');
            $routes->post('categories/create', 'Admin\BlogCategoryController::create');
            $routes->post('categories/update/(:num)', 'Admin\BlogCategoryController::update/$1');
            $routes->delete('categories/delete/(:num)', 'Admin\BlogCategoryController::delete/$1');
        });

        // Products & Orders
        $routes->group('shop', function($routes) {
            $routes->get('products', 'Admin\ProductController::index');
            $routes->get('products/new', 'Admin\ProductController::new');
            $routes->post('products/create', 'Admin\ProductController::create');
            $routes->get('products/edit/(:num)', 'Admin\ProductController::edit/$1');
            $routes->post('products/update/(:num)', 'Admin\ProductController::update/$1');
            $routes->delete('products/delete/(:num)', 'Admin\ProductController::delete/$1');

            $routes->get('orders', 'Admin\OrderController::index');
            $routes->get('orders/view/(:num)', 'Admin\OrderController::show/$1');
            $routes->post('orders/update-status/(:num)', 'Admin\OrderController::updateStatus/$1');
        });

        // Inquiries
        $routes->group('inquiries', function($routes) {
            $routes->get('/', 'Admin\InquiryController::index');
            $routes->get('view/(:num)', 'Admin\InquiryController::show/$1');
            $routes->post('reply/(:num)', 'Admin\InquiryController::reply/$1');
            $routes->delete('delete/(:num)', 'Admin\InquiryController::delete/$1');
        });

        // Subscribers
        $routes->group('subscribers', function($routes) {
            $routes->get('/', 'Admin\SubscriberController::index');
            $routes->get('toggle/(:num)', 'Admin\SubscriberController::toggle/$1');
            $routes->delete('delete/(:num)', 'Admin\SubscriberController::delete/$1');
        });

        // FAQs
        $routes->group('faqs', function($routes) {
            $routes->get('/', 'Admin\FaqController::index');
            $routes->get('create', 'Admin\FaqController::create');
            $routes->get('edit/(:num)', 'Admin\FaqController::edit/$1');
            $routes->post('store', 'Admin\FaqController::store');
            $routes->delete('delete/(:num)', 'Admin\FaqController::delete/$1');
        });

        // Testimonials
        $routes->group('testimonials', function($routes) {
            $routes->get('/', 'Admin\TestimonialController::index');
            $routes->get('create', 'Admin\TestimonialController::create');
            $routes->get('edit/(:num)', 'Admin\TestimonialController::edit/$1');
            $routes->post('store', 'Admin\TestimonialController::store');
            $routes->delete('delete/(:num)', 'Admin\TestimonialController::delete/$1');
        });

        // Clients
        $routes->group('clients', function($routes) {
            $routes->get('/', 'Admin\ClientController::index');
            $routes->get('create', 'Admin\ClientController::create');
            $routes->get('edit/(:num)', 'Admin\ClientController::edit/$1');
            $routes->post('store', 'Admin\ClientController::store');
            $routes->delete('delete/(:num)', 'Admin\ClientController::delete/$1');
        });

        // Team
        $routes->group('team', function($routes) {
            $routes->get('/', 'Admin\TeamMemberController::index');
            $routes->get('create', 'Admin\TeamMemberController::create');
            $routes->get('edit/(:num)', 'Admin\TeamMemberController::edit/$1');
            $routes->post('store', 'Admin\TeamMemberController::store');
            $routes->delete('delete/(:num)', 'Admin\TeamMemberController::delete/$1');
        });

        // Settings (Superadmin Only)
        $routes->group('settings', ['filter' => 'role:superadmin'], function($routes) {
            $routes->get('/', 'Admin\SettingController::index');
            $routes->post('update', 'Admin\SettingController::update');
            
            $routes->get('users', 'Admin\UserController::index');
            $routes->get('users/new', 'Admin\UserController::new');
            $routes->post('users/create', 'Admin\UserController::create');
            $routes->get('users/edit/(:num)', 'Admin\UserController::edit/$1');
            $routes->post('users/update/(:num)', 'Admin\UserController::update/$1');
        });
        
        // Static Pages
        $routes->group('pages', function($routes) {
            $routes->get('/', 'Admin\PageController::index');
            $routes->get('new', 'Admin\PageController::new');
            $routes->post('create', 'Admin\PageController::create');
            $routes->get('edit/(:num)', 'Admin\PageController::edit/$1');
            $routes->post('update/(:num)', 'Admin\PageController::update/$1');
            $routes->delete('delete/(:num)', 'Admin\PageController::delete/$1');
        });
        
        // Media Library
        $routes->get('media', 'Admin\MediaController::index');
        $routes->post('media/upload', 'Admin\MediaController::upload');
        $routes->delete('media/delete/(:num)', 'Admin\MediaController::delete/$1');
    });
});

// --- PUBLIC ROUTES ---
$routes->get('services', 'Public\Service::index');
$routes->get('services/(:segment)', 'Public\Service::detail/$1');
$routes->get('portfolio', 'Public\Portfolio::index');
$routes->get('portfolio/(:segment)', 'Public\Portfolio::detail/$1');
$routes->get('blog', 'Public\Blog::index');
$routes->get('blog/(:segment)', 'Public\Blog::detail/$1');
$routes->get('produk', 'Public\Shop::index');
$routes->get('produk/(:segment)', 'Public\Shop::detail/$1');
$routes->get('kontak', 'Public\Contact::index');
$routes->post('kontak', 'Public\Contact::submit', ['filter' => 'ratelimit']);
$routes->get('tim/(:segment)', 'Public\Team::profile/$1');
$routes->get('pages/(:segment)', 'Public\Page::show/$1');
$routes->post('newsletter/subscribe', 'Public\Newsletter::subscribe');
