<?php

namespace App\Libraries;

use Config\Services;
use Config\Database;

class EmailService
{
    protected $email;
    protected $db;

    public function __construct()
    {
        $this->email = Services::email();
        $this->db = Database::connect();
    }

    public function sendFromTemplate($templateName, $to, $data = [])
    {
        $template = $this->db->table('email_templates')
                             ->where('name', $templateName)
                             ->where('is_active', 1)
                             ->get()
                             ->getRow();

        if (!$template) return false;

        $subject = $template->subject;
        $body = $template->body;

        // Replace variables
        foreach ($data as $key => $val) {
            $subject = str_replace('{' . $key . '}', $val, $subject);
            $body = str_replace('{' . $key . '}', $val, $body);
        }

        // Add footer/branding
        $companyName = get_setting('company_name', 'CodeNova');
        $body .= "<br><br><hr><p style='font-size:12px; color:#888;'>Pesan ini dikirim secara otomatis oleh sistem {$companyName}.</p>";

        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($body);

        return $this->email->send();
    }

    public function sendDirect($to, $subject, $message)
    {
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        return $this->email->send();
    }
}
