
    // ABOUT US PAGE FIELDS (Phase 7)
    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'About Us Page Content',
        'fields' => array(
            // Hero Section
            array('key' => 'field_about_hero_title', 'label' => 'Hero Title', 'name' => 'about_hero_title', 'type' => 'text'),
            array('key' => 'field_about_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'about_hero_subtitle', 'type' => 'text'),
            array('key' => 'field_about_hero_image', 'label' => 'Hero Background Image', 'name' => 'about_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Main About Section
            array('key' => 'field_about_main_title', 'label' => 'Main Section Title', 'name' => 'about_main_title', 'type' => 'text'),
            array('key' => 'field_about_main_content', 'label' => 'Main About Content', 'name' => 'about_main_content', 'type' => 'wysiwyg'),
            array('key' => 'field_about_main_image', 'label' => 'Main Section Image', 'name' => 'about_main_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Philosophy Section
            array('key' => 'field_about_philosophy_title', 'label' => 'Philosophy Title', 'name' => 'about_philosophy_title', 'type' => 'text'),
            array('key' => 'field_about_philosophy_content', 'label' => 'Philosophy Content', 'name' => 'about_philosophy_content', 'type' => 'wysiwyg'),
            
            // Programmes Section
            array('key' => 'field_about_programmes_title', 'label' => 'Programmes Section Title', 'name' => 'about_programmes_title', 'type' => 'text'),
            array('key' => 'field_about_programmes_desc', 'label' => 'Programmes Description', 'name' => 'about_programmes_desc', 'type' => 'textarea'),
            
            // Founder Section
            array('key' => 'field_founder_name', 'label' => 'Founder Name', 'name' => 'founder_name', 'type' => 'text'),
            array('key' => 'field_founder_title', 'label' => 'Founder Title/Designation', 'name' => 'founder_title', 'type' => 'text'),
            array('key' => 'field_founder_photo', 'label' => 'Founder Photo', 'name' => 'founder_photo', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_founder_signature', 'label' => 'Founder Signature Image', 'name' => 'founder_signature', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_founder_message', 'label' => 'Founder Message', 'name' => 'founder_message', 'type' => 'wysiwyg'),
            
            // Mission & Vision
            array('key' => 'field_about_mission_title', 'label' => 'Mission Title', 'name' => 'about_mission_title', 'type' => 'text'),
            array('key' => 'field_about_mission_text', 'label' => 'Mission Text', 'name' => 'about_mission_text', 'type' => 'textarea'),
            array('key' => 'field_about_vision_title', 'label' => 'Vision Title', 'name' => 'about_vision_title', 'type' => 'text'),
            array('key' => 'field_about_vision_text', 'label' => 'Vision Text', 'name' => 'about_vision_text', 'type' => 'textarea'),
            
            // Legacy/Story Section
            array('key' => 'field_legacy_title', 'label' => 'Story Section Title', 'name' => 'legacy_title', 'type' => 'text'),
            array('key' => 'field_legacy_text', 'label' => 'Story Content', 'name' => 'legacy_text', 'type' => 'wysiwyg'),
            array('key' => 'field_legacy_side_image', 'label' => 'Story Section Image', 'name' => 'legacy_side_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Infrastructure
            array('key' => 'field_infra_title', 'label' => 'Infrastructure Title', 'name' => 'infra_title', 'type' => 'text'),
            array('key' => 'field_infra_desc', 'label' => 'Infrastructure Description', 'name' => 'infra_desc', 'type' => 'text'),
            array('key' => 'field_infra_1_title', 'label' => 'Infra Item 1 Title', 'name' => 'infra_1_title', 'type' => 'text'),
            array('key' => 'field_infra_1_image', 'label' => 'Infra Item 1 Image', 'name' => 'infra_1_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_infra_2_title', 'label' => 'Infra Item 2 Title', 'name' => 'infra_2_title', 'type' => 'text'),
            array('key' => 'field_infra_2_image', 'label' => 'Infra Item 2 Image', 'name' => 'infra_2_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_infra_3_title', 'label' => 'Infra Item 3 Title', 'name' => 'infra_3_title', 'type' => 'text'),
            array('key' => 'field_infra_3_image', 'label' => 'Infra Item 3 Image', 'name' => 'infra_3_image', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ),
            ),
        ),
    ));
