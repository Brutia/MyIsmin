<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider as IlluminateUserProvider;
use App\User;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 *
 * @author Guillaume
 *        
 */
class LdapAuthUserProvider implements IlluminateUserProvider {
	
	
	
	
/**
     * {@inheritdoc}
     */
    public function retrieveById($identifier)
    {
        return User::find($identifier);
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByToken($identifier, $token)
    {
        return User::where('remember_token','=',$token)->firstOrFail();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByCredentials(array $credentials)
    {

    	if (Adldap::getProvider('default')->auth()->attempt($credentials["username"], $credentials["password"])) {
    		// Passed!
//     		dd('ok');
			$temp = User::where('username','=',$credentials["username"])->select('username','name')->first();
// 			dd($temp);
// 			$temp= 'coucou';
    		return $temp;
    	}
    	dd('pas ici');
//     	return parent::retrieveByCredentials($credentials);
		return null;

//    
    }
    
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
    	// TODO: Implement validateCredentials() method.
    	// we'll assume if a user was retrieved, it's good
    	return true;
//     	dd('coucou');
    	if($user->username == $credentials['username'] && $user->getAuthPassword() == bcrypt($credentials['password']))
    	{
    
//     		$user->last_login_time = Carbon::now();
// 			$user->name = 'test'
//     		$user->save();
    
    		return true;
    	}
    	return false;
    
    
    }
    
    /**
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
    	$user->remember_token = $token;
    	$user->save();
    }
}