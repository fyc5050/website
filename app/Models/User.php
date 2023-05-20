<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasUuidColumn, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'des_count', 'is_admin', 'is_des_manager',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'is_des_manager' => 'boolean',
        'des_count' => 'integer',
    ];

    public function password(): Attribute
    {
        return Attribute::set(fn ($value) => Hash::make($value));
    }

    public function desCount(): Attribute
    {
        return Attribute::set(fn ($value) => max(-1, $value));
    }

    public function canAccessFilament(): bool
    {
        return $this->is_admin;
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function desMutations(): HasMany
    {
        return $this->hasMany(DesMutation::class);
    }
}
