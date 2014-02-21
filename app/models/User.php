<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {
	use HasRole;

    /**
     * Check if user has a permission by its name
     *
     * @param string $permission Permission string.
     *
     * @access public
     *
     * @return boolean
     */
    public function can( $permission )
    {
        foreach ($this->roles as $role) {
            // Deprecated permission value within the role table.
            if( is_array($role->permissions) && in_array($permission, $role->permissions) )
            {
                return true;
            }

            foreach($role->perms as $perm) {
                if($perm->name == $permission && \Request::isMethod($perm->method)) {
                    return true;
                }
            }
        }
        return false;
    }

}
