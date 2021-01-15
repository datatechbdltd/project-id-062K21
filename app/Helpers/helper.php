
<?php

use App\Language;
use App\Page;
use App\StaticOption;
use Illuminate\Support\Facades\App;


if (!function_exists('random_code')){

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
    }

    function get_all_languages(){
        return Language::all();
    }

    function get_active_languages(){
        return Language::where('status', true)->get();
    }

    function get_current_language()
    {
        $locale = App::getLocale();
        return Language::where("code", $locale)->first();
    }

    function get_default_language()
    {
        return Language::where("is_default", true)->first();
    }

    function get_language_by_code($code)
    {
        return Language::where("code", $code)->first();
    }

    function get_active_pages()
    {
        return Page::where("status", true)->get();
    }


    /**
     * @param $table
     * @param $column
     * @return mixed
     *
     */
    function get_content_by_language($table){
        if (get_current_language()->$table){
            return get_current_language()->$table;
        }else{
            return get_default_language()->$table;
        }
    }

    function get_all_o_auth()
    {
        return \App\oAuth::all();
    }

    function set_env_value(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }


    function test_smtp_mail($to)
    {
        $subject= 'SMTP Test';
        $message= 'SMTP working fine';
        $name = get_static_option('smtp_email_from_name');
        $from = get_static_option('smtp_email_from_email');
        $headers = "From: " . $name . " \r\n";
        $headers .= "Reply-To: <$from> \r\n";
        $headers .= "Return-Path: " . ($from) . "\r\n";;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 2\nX-MSmail-Priority: high";;
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            return true;
        }else{
            return false;
        }
    }



}
