<?php

namespace App\Libraries;

class SeoHelper
{
    public static function generateMeta($data = [])
    {
        $siteTitle = get_setting('company_name', 'CodeNova');
        $defaultTitle = get_setting('meta_title_default', $siteTitle);
        $defaultDesc = get_setting('meta_description_default', '');
        $defaultOg = get_setting('company_og_image', '');

        $title = isset($data['title']) ? $data['title'] . ' | ' . $siteTitle : $defaultTitle;
        $description = $data['description'] ?? $defaultDesc;
        $keywords = $data['keywords'] ?? get_setting('meta_keywords_default', '');
        $image = $data['image'] ?? $defaultOg;
        $url = $data['url'] ?? current_url();

        return "
            <title>{$title}</title>
            <meta name=\"description\" content=\"{$description}\">
            <meta name=\"keywords\" content=\"{$keywords}\">
            <meta property=\"og:title\" content=\"{$title}\">
            <meta property=\"og:description\" content=\"{$description}\">
            <meta property=\"og:image\" content=\"" . base_url($image) . "\">
            <meta property=\"og:url\" content=\"{$url}\">
            <meta property=\"og:type\" content=\"website\">
            <meta name=\"twitter:card\" content=\"summary_large_image\">
        ";
    }
}
