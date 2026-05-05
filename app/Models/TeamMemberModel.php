<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamMemberModel extends Model
{
    protected $table            = 'team_members';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'name', 'slug', 'position', 'department', 'bio', 'photo', 'email', 
        'linkedin_url', 'github_url', 'instagram_url', 'twitter_url', 
        'skills', 'is_founder', 'is_active', 'sort_order'
    ];

    protected $useTimestamps = false;
}
