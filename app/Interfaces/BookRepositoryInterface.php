<?php

namespace App\Interfaces;

interface BookrepositoryInterface
{
    public function getPaginated($perPage = 10, ?string $search = null);
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}