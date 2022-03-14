<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function general(Request $request)
    {
        $method = $request->method();
        if ($method === 'GET') {
            $settings = Setting::where('option', 'general-settings')->select('option_value')->first();
            if ($settings) {
                $settings = json_decode(Setting::where('option', 'general-settings')->select('option_value')->first()->option_value);
            } else {
                $settings = null;
            }
            return view('admin.pages.settings.general', compact('settings'));
        }

        $body = $request->all();
        $this->update($body, 'general-settings', true);
        return redirect()->back()->with('success', 'General Settings has been updated!');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function email(Request $request)
    {
        $method = $request->method();
        if ($method === 'GET') {
            $settings = Setting::where('option', 'email-settings')->select('option_value')->first();
            if ($settings) {
                $settings = json_decode(Setting::where('option', 'email-settings')->select('option_value')->first()->option_value);
            } else {
                $settings = null;
            }
            return view('admin.pages.settings.email', compact('settings'));
        }

        $body = $request->all();
        $this->update($body, 'email-settings', true);
        return redirect()->back()->with('success', 'Email Settings has been updated!');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function seo(Request $request)
    {
        $method = $request->method();
        if ($method === 'GET') {
            $settings = Setting::where('option', 'seo-settings')->select('option_value')->first();
            if ($settings) {
                $settings = json_decode(Setting::where('option', 'seo-settings')->select('option_value')->first()->option_value);
            } else {
                $settings = null;
            }
            return view('admin.pages.settings.seo', compact('settings'));
        }

        $body = $request->all();
        $newBody = array_map(function ($value) {
            return is_array(json_decode($value, true)) ? $this->generate_tags($value) : $value;
        }, $body);

        $this->update($newBody, 'seo-settings');
        return redirect()->back()->with('success', 'SEO Settings has been updated!');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $method = $request->method();
        if ($method === 'GET') {
            $settings = Setting::where('option', 'payment-settings')->select('option_value')->first();
            if ($settings) {
                $settings = json_decode(Setting::where('option', 'payment-settings')->select('option_value')->first()->option_value);
            } else {
                $settings = null;
            }
            return view('admin.pages.settings.payment', compact('settings'));
        }

        $body = $request->all();
        $this->update($body, 'payment-settings', true);
        return redirect()->back()->with('success', 'Payment Settings has been updated!');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function analytics(Request $request)
    {
        $method = $request->method();
        if ($method === 'GET') {
            $settings = Setting::where('option', 'analytics-settings')->select('option_value')->first();
            if ($settings) {
                $settings = json_decode(Setting::where('option', 'analytics-settings')->select('option_value')->first()->option_value);
            } else {
                $settings = null;
            }
            return view('admin.pages.settings.analytics', compact('settings'));
        }

        $body = $request->all();
        $this->update($body, 'analytics-settings');
        return redirect()->back()->with('success', 'Analytics Settings has been updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array  $body
     * @param  string  $option_key
     * @param  boolean  $is_environment_enabled
     */
    private function update(array $body, string $option_key, bool $is_environment_enabled = false)
    {
        if ($is_environment_enabled) {
            foreach ($body as $key => $value) {
                if ($key === '_token' || $key === '_method') {
                    continue;
                }
                if ($value === 'true') {
                    $value = true;
                } elseif ($value === 'false') {
                    $value = false;
                }
                $this->setEnv(strtoupper($key), $value);
            }
        }

        $json_value = $this->generate_page_option($body);
        $setting = Setting::where('option', $option_key)->first();
        if ($setting) {
            $setting->option_value = $json_value;
            $setting->save();
        } else {
            $setting = new Setting();
            $setting->option = $option_key;
            $setting->option_value = $json_value;
            $setting->save();
        }
    }

    /**
     * Update the specified ENV file in storage.
     *
     * @param  string $key
     * @param  string | null $value
     * @return bool
     */
    private function setEnv (string $key, string | null $value) {
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
            ));
        }

        return true;
    }
}
