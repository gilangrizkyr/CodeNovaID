<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\TeamMemberModel;

class Team extends BaseController
{
    protected $teamModel;

    public function __construct()
    {
        $this->teamModel = new TeamMemberModel();
    }

    public function profile($slug)
    {
        $member = $this->teamModel->where('slug', $slug)->where('is_active', 1)->first();
        if (!$member) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'seo' => [
                'title' => $member->name . ' - ' . $member->position,
                'description' => substr(strip_tags($member->bio), 0, 160),
                'image' => base_url($member->photo)
            ],
            'member' => $member
        ];

        return view('public/team/profile', $data);
    }
}
