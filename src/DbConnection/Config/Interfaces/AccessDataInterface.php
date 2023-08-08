<?php

namespace App\DbConnection\Config\Interfaces;

interface AccessDataInterface
{
    public function getUser(): string;

    public function setUser(string $user): static;

    public function getPass(): string;

    public function setPass(string $pass): static;
}