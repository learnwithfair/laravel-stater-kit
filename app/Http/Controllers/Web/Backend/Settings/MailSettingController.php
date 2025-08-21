<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class MailSettingController extends Controller {
    /**
     * Display the Mail settings page if the user has the 'mail_setting' permission.
     *
     * @return View|RedirectResponse
     */
    public function index() {
        if (User::find(auth()->user()->id)) {
            return view('backend.layouts.settings.mail_settings');
        }
        return redirect()->back();
    }

    /**
     * Update the Mail settings in the .env file if the user has the 'mail_setting' permission.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request) {
        if (User::find(auth()->user()->id)) {
            $request->validate([
                'mail_mailer'       => 'nullable|string',
                'mail_host'         => 'nullable|string',
                'mail_port'         => 'nullable|string',
                'mail_username'     => 'nullable|string',
                'mail_password'     => 'nullable|string',
                'mail_encryption'   => 'nullable|string',
                'mail_from_address' => 'nullable|string',
            ]);
            try {
                $envContent = File::get(base_path('.env'));
                $lineBreak  = "\n";
                $envContent = preg_replace([
                    '/MAIL_MAILER=(.*)\s/',
                    '/MAIL_HOST=(.*)\s/',
                    '/MAIL_PORT=(.*)\s/',
                    '/MAIL_USERNAME=(.*)\s/',
                    '/MAIL_PASSWORD=(.*)\s/',
                    '/MAIL_ENCRYPTION=(.*)\s/',
                    '/MAIL_FROM_ADDRESS=(.*)\s/',
                ], [
                    'MAIL_MAILER=' . $request->mail_mailer . $lineBreak,
                    'MAIL_HOST=' . $request->mail_host . $lineBreak,
                    'MAIL_PORT=' . $request->mail_port . $lineBreak,
                    'MAIL_USERNAME=' . $request->mail_username . $lineBreak,
                    'MAIL_PASSWORD=' . $request->mail_password . $lineBreak,
                    'MAIL_ENCRYPTION=' . $request->mail_encryption . $lineBreak,
                    'MAIL_FROM_ADDRESS=' . '"' . $request->mail_from_address . '"' . $lineBreak,
                ], $envContent);

                if ($envContent !== null) {
                    File::put(base_path('.env'), $envContent);
                }
                return back()->with('t-success', 'Updated successfully');
            } catch (Exception) {
                return back()->with('t-error', 'Failed to update');
            }
        }
        return redirect()->back();
    }
}
