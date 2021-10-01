<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Sinbadxiii\PhalconAuth\Contracts\RememberingInterface;
use Sinbadxiii\PhalconAuth\Contracts\RememberTokenterface;
use Sinbadxiii\PhalconAuth\RememberToken\RememberTokenModel;
use Sinbadxiii\PhalconAuth\Contracts\AuthenticatableInterface;
use Sinbadxiii\PhalconPermission\Contracts\HavingRoles;
use Sinbadxiii\PhalconPermission\Roles\RolesModel as Roles;
use Sinbadxiii\PhalconPermission\Roles\UsersRolesModel as UsersRoles;

class Users extends \Phalcon\Mvc\Model implements AuthenticatableInterface, RememberingInterface, HavingRoles
{
    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $published;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("users");

        $this->hasOne(
            'id',
            RememberTokenModel::class,
            'user_id',
            [
                'alias' => "remember_token"
            ]
        );

        $this->hasManyToMany(
            'id',
            UsersRoles::class,
            'user_id', 'role_id',
            Roles::class,
            "id",
            [
                'alias' => "roles"
            ]
        );
    }

    /**
     * @return int
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * @return RememberTokenModel
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param $value
     */
    public function setRememberToken(RememberTokenterface $value)
    {
        $this->remember_token = $value;
    }

    public function roles($params = [])
    {
        return $this->getRoles($params);
    }

}
