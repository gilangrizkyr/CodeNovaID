<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class Auth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminUserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        // Validation (Rules are in Config/Validation.php)
        if (!$this->validate('login')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->adminModel->getByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah.');
        }

        // Set Session
        $sessionData = [
            'admin_id'   => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'role'       => $user->role,
            'isLoggedIn' => true,
        ];
        session()->set($sessionData);

        // Update Last Login
        $this->adminModel->updateLogin($user->id);

        // Log activity
        $activityService = new \App\Libraries\ActivityService();
        $activityService->log('Login ke dashboard', $user->id);

        return redirect()->to(base_url('admin/dashboard'))->with('success', 'Selamat datang kembali, ' . $user->name);
    }

    public function logout()
    {
        $activityService = new \App\Libraries\ActivityService();
        $activityService->log('Logout dari dashboard', session()->get('admin_id'));

        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'Anda telah berhasil logout.');
    }

    public function forgotPassword()
    {
        return view('admin/auth/forgot_password');
    }

    public function attemptForgotPassword()
    {
        $email = $this->request->getPost('email');
        $user = $this->adminModel->where('email', $email)->first();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $this->adminModel->update($user->id, [
                'reset_token' => $token,
                'reset_expire' => date('Y-m-d H:i:s', strtotime('+1 hour'))
            ]);

            // Send email
            $emailService = new \App\Libraries\EmailService();
            $emailService->sendDirect($email, 'Reset Password Admin', "Klik link berikut untuk reset password Anda: " . base_url('admin/reset-password/'.$token));
        }

        return redirect()->back()->with('success', 'Jika email terdaftar, instruksi reset akan dikirim.');
    }
}
