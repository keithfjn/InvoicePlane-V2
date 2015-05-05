<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Request;

class IPStart
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * First check if the app needs to be installed
         */
        // Get the environment variable for this
        $is_installed = env('APP_SETUP_COMPLETE', false);

        // Redirect to the setup if InvoicePlane is not installed yet
        if ($is_installed === false) {
            // Get all available languages
            $languages = \App\Helpers\IP::getAllLanguages();

            // Return the setup view
            return view('setup.start')->with('languages', $languages);
        }

        /*
         * If the app is ready to use try to authentificate the user
         */
        // Redirect to login page if user is not logged in
        if (!Auth::check() && $request->path() != 'auth/login') {
            return redirect('auth/login');
        }

        /*
         * Get the user details and share them with the app
         */

        return $next($request);
    }

}
