<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    //use HasFactory;
    protected $table = 'personnes';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'matricule', 'categorie'];
}
