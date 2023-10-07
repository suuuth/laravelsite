<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;
use App\Libraries\Traits\PropertyCasts;
use App\Entities\AbstractEntity;

class User extends Authenticatable
{
    use PropertyCasts, AbstractEntity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
        'created' => 'DateTime',
        'updated' => '?DateTime'
    ];

    protected int $id;
    protected string $email;
    protected string $username;
    protected string $password;
    protected DateTime $created;
    protected ?DateTime $updated;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Override to make Auth::attempt work
     *
     * @return string
     */
    public function getAuthPassword()
    {
        $this->setPropertyValues($this->attributes);
        return $this->getPassword();
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return User
     */
    public function setCreated(DateTime $created): User
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }

    /**
     * @param ?DateTime $updated
     * @return User
     */
    public function setUpdated(?DateTime $updated): User
    {
        $this->updated = $updated;
        return $this;
    }
}
