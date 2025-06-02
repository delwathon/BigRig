<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
use App\Models\EnrolmentBatches;
use App\Models\EmailConfig;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('email_configs')) {
            $mail = EmailConfig::first(); // or use a cache if performance is critical

            if ($mail) {
                $decrypted_password = Crypt::decryptString($mail->smtp_password);
                Config::set('mail.mailers.smtp.host', $mail->smtp_host);
                Config::set('mail.mailers.smtp.port', $mail->smtp_port);
                Config::set('mail.mailers.smtp.username', $mail->smtp_username);
                Config::set('mail.mailers.smtp.password', $decrypted_password);
                Config::set('mail.mailers.smtp.encryption', $mail->smtp_encryption);
                Config::set('mail.from.address', $mail->from_email);
                Config::set('mail.from.name', $mail->from_name);
            }
        };

        view()->composer('*', function ($view) {
            $view->with([
                'settings' => Settings::first(),
                'activeBatch' => EnrolmentBatches::where('active_batch', true)->first(),
            ]);
        });
    }
}
