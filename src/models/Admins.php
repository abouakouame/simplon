<?php

namespace App\Models;
class Admins{
    public string $AdminNom;
    public string $AdminPrenom;
    public string $AdminEmail;
    protected string $AdminPassword;
    protected string $AdminPasswordConfirm;
    public string $created_at;
    public string $update_at;
}
