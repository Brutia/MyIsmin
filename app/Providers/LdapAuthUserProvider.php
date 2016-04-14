<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use App\User;
use Adldap\Laravel\Facades\Adldap;

/**
 *
 * @author Guillaume
 *        
 */
class LdapAuthUserProvider extends EloquentUserProvider {
	
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
    		dd('ok');
    		return User::find(2);
    	}
//     	if ($this->getLoginFallback()) {
    		//             // Login failed. If login fallback is enabled
    		//             // we'll call the eloquent driver.
    	return parent::retrieveByCredentials($credentials);
//     	}
//     	return User::find(2);
    	 
//         // Get the search query for users only.
//         $query = $this->newAdldapUserQuery();

//         // Make sure the connection is bound
//         // before we try to utilize it.
//         if ($query->getConnection()->isBound()) {
// //         	dd($credentials);
// //             Get the username input attributes.
//             $attributes = $this->getUsernameAttribute();
// // 			dd($attributes);
//             // Get the input key.
//             $key = key($attributes);
//             // Filter the query by the username attribute.
// //             dd($attributes[$key]);
//             $query->whereEquals($attributes[$key], $credentials[$key]);
// // 			dd($query);
//             // Retrieve the first user result.
//             $user = $query->first();
// 			dd($user);
//             // If the user is an Adldap User model instance.
//             if ($user instanceof User) {
//                 // Retrieve the users login attribute.
//                 $username = $user->{$this->getLoginAttribute()};

//                 if (is_array($username)) {
//                     // We'll make sure we retrieve the users first username
//                     // attribute if it's contained in an array.
//                     $username = Arr::get($username, 0);
//                 }

//                 // Get the password input array key.
//                 $key = $this->getPasswordKey();

//                 // Try to log the user in.
//                 if ($this->authenticate($username, $credentials[$key])) {
//                     // Login was successful, we'll create a new
//                     // Laravel model with the Adldap user.
//                     return $this->getModelFromAdldap($user, $credentials[$key]);
//                 }
//             }
//         }

//         
//         }
    }
}