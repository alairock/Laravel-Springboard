<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends BaseController {

    public function index()
    {
        $users = User::all();
        $this->layout->content = View::make('users.index', compact('users'));
    }

    /**
     * Displays the form for account creation
     *
     */
    public function create()
    {
        $this->layout->title = 'Sign Up';
        $this->layout->content = View::make(Config::get('confide::signup_form'));
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {
        $user = new User;

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id )
        {
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                        return Redirect::action('UserController@login')
                            ->with( 'notice', Lang::get('confide::confide.alerts.account_created') );
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');

                        return Redirect::action('UserController@create')
                            ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        if( Confide::user() )
        {
            // If user is logged, redirect to internal
            // page, change it to '/admin', '/dashboard' or something
            return Redirect::intended('/')->withMessage('You are already logged in!');
        }
        else
        {
            $this->layout->content = View::make(Config::get('confide::login_form'));
        }
    }

    public function switch_user($id) {
        Session::put('switch_user.status', true);
        Session::put('switch_user.user_id', Auth::user()->id);
        if (Auth::loginUsingId($id)) {
            return Redirect::to('/')->withMessage('You have switched users!');
        } else {
            Session::forget('switch_user');
        }
        return Redirect::to('/')->withError('You did not switch users');
    }

    public function switch_back() {
        if ((Session::has('switch_user.status') && Session::has('switch_user.user_id'))) {
            if (Auth::loginUsingId(Session::get('switch_user.user_id'))) {
                Session::forget('switch_user');
                return Redirect::to('admin/users')->withMessage('You are admin again!');
            }
        }
        return Redirect::to('/')->withError('Something went wrong...');
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // so we have to pass both
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Get the value from the config file instead of changing the controller
        if ( Confide::logAttempt( $input, Config::get('confide::signup_confirm') ) )
        {
            // Redirect the user to the URL they were trying to access before
            // caught by the authentication filter IE Redirect::guest('user/login').
            // Otherwise fallback to '/'
            // Fix pull #145
            return Redirect::intended('/')->withMessage('You are now logged in!'); // change it to '/admin', '/dashboard' or something
        }
        else
        {
            $user = new User;

            // Check if there was too many login attempts
            if( Confide::isThrottled( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            }
            elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            }
            else
            {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UserController@login')->withInput(Input::except('password'))->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function confirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
                        return Redirect::action('UserController@login')
                            ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        $this->layout->content = View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function do_forgot_password()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
                        return Redirect::action('UserController@forgot_password')
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function reset_password( $token )
    {
        $this->layout->content = View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     */
    public function do_reset_password()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
                        return Redirect::action('UserController@login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
                        return Redirect::action('UserController@reset_password', array('token'=>$input['token']))
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/')->withMessage('You are now logged out!');
    }

    /**
     * Edit existing user
     *
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (Request::isMethod('post') && $user) {
            $user->username = Input::get('username');
            if ($user->updateUniques()) {
                return Redirect::to('/admin/users/')->withMessage('User has been updated successfully');
            }
            return Redirect::back()->withErrors($user->errors());
        }
        $this->layout->content = View::make('users.edit')->with(compact('user'));
    }

    /**
     * Attach role to user
     *
     */
    public function attach_role($id)
    {
        $user = User::find($id);
        if (Request::isMethod('post') && $user) {
            $roleId = Input::get('roles');
            if ($user->hasRole(Role::find($roleId)->name)) {
                return Redirect::back()->withError('The user already has this role.');
            }
            $user->attachRole($roleId);
            return Redirect::back()->withMessage('Successfully attached role to user');
        }

        $roles = Role::all();
        foreach ($roles as $role) {
            $rolesList[$role->id] = $role->name;
        }

        $myRoles = User::find($id)->roles;
        $this->layout->content = View::make('users.attach_role')->with(compact('user', 'rolesList', 'myRoles'));
    }

    /**
     * Revoke a users role
     *
     */
    public function revoke_role($user_id, $role_id)
    {
        $user = User::findOrFail($user_id);
        $result = $user->roles()->detach($role_id);
        return Redirect::back()->withMessage('Revoked Attachment');
    }

}
