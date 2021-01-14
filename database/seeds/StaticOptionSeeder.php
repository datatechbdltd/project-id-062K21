<?php

use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_static_option('company_name', '');
        set_static_option('company_motto', '');
        set_static_option('company_email', '');
        set_static_option('company_phone', '');
        set_static_option('company_address', '');
        set_static_option('company_website_address', '');
        set_static_option('website_footer_credit', '');

        set_static_option('website_logo', '');
        set_static_option('favicon', '');
        set_static_option('meta_image', '');

        set_static_option('website_color', '');

        set_static_option('session_lifetime', '');

        set_static_option('smtp_email_host', '');
        set_static_option('smtp_email_port', '');
        set_static_option('smtp_email_username', '');
        set_static_option('smtp_email_password', '');
        set_static_option('smtp_email_encryption', '');
        set_static_option('smtp_email_from_name', '');
        set_static_option('smtp_email_from_email', '');

        set_static_option('company_linkedin', '');
        set_static_option('company_facebook', '');
        set_static_option('company_instagram', '');
        set_static_option('company_twitter', '');
        set_static_option('company_whatsapp', '');
        set_static_option('company_imo', '');
        set_static_option('company_youtube', '');
        set_static_option('company_facebook_page_sms_script', '');

        //set_static_option('invoice_mail_to_user', '1');

    }
}
