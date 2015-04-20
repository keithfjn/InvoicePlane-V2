<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

class SetupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Get the APP_SETUP_COMPLETE environment variable
        $is_installed = env('APP_SETUP_COMPLETE', false);

        // Redirect to the dashboard if InvoicePlane is already installed
        if ($is_installed === true) {
            return redirect('/');
        }

        // Get all available languages
        $languages = \App\Helpers\IP::getAllLanguages();

        // Return the setup view
        return view('setup.start')->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function setLanguage()
    {
        // Check if a language was provided
        $validator = Validator::make(
            ['name' => Input::get('language')],
            ['name' => 'required']
        );

        // Return view for the next step
        return view('setup.checkRequirements');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getDatabaseConfig()
    {

        return view('setup.start');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function seedDatabase()
    {
        $settings_array = array(
            'version' => '1.0.0',
            'default_language' => Config::get('app.locale'),
            'date_format' => 'm/d/Y',
            'currency_symbol' => '$',
            'currency_symbol_placement' => 'before',
            'invoices_due_after' => 30,
            'quotes_expire_after' => 15,
            'default_invoice_group' => 1,
            'default_quote_group' => 2,
            'thousands_separator' => ',',
            'decimal_point' => '.',
            'cron_key' => \App\Helpers\IP::random_string(15),
            'tax_rate_decimal_places' => 2,
            'pdf_invoice_template' => 'default',
            'pdf_invoice_template_paid' => 'default',
            'pdf_invoice_template_overdue' => 'default',
            'pdf_quote_template' => 'default',
            'public_invoice_template' => 'default',
            'public_quote_template' => 'default',
            'disable_sidebar' => 1
        );

        foreach ($settings_array as $setting => $value) {
            Settings::create(['name' => $setting, 'value' => $value]);
        }
    }

}
