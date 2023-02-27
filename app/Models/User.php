<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'address',
        'phoneNumber',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id', 'id');
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    




    // Relation
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    
    // Check Role
    private function getUserRole()  // digunakan untuk mendapatkan role_id
    {
        return $this->role()->getResults();
    }

    private function checkRole($role)   //pengecekan role apakah request di route sama dengan level user yg ada di db
    {
        return (strtolower($role) == strtolower($this->have_role->role)) ? true : false ;   //  jika false route akan forbidden
    }

    public function hasRole($roles)     // action penentuan apakah bisa diakses atau forbidden
    {
        $this->have_role = $this->getUserRole();    // ambil role_id user
        
        if (is_array($roles)) {     // jika role dalam bentuk array (memiliki lebih dari 1 level user)
            foreach ($roles as $need_role) {
                if ($this->checkRole($need_role)) {
                    return true;
                }
            }
        } else {    // jika role hanya 1
            return $this->checkRole($roles);    // akan dilempar ke function checkRole()
        }
        return false; // jika tidak ada, maka akan forbidden
    }

}
