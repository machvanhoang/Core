<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Summary of paginate
     * @param mixed $itemPerPage
     * @param mixed $conditions
     * @param mixed $orderBy
     * @param mixed $search
     * @param mixed $relationships
     * @return void
     */
    public function paginate($itemPerPage, array $conditions = [], array $orderBy = [], array $search = [], array $relationships = []);
    /**
     * Get all
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Summary of getAllWithTrashed
     * @return void
     */
    public function getAllWithTrashed();

    /**
     * Get one
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Summary of findOneBy
     * @param mixed $conditions
     * @param mixed $relationships
     * @return void
     */
    public function findOneBy(array $conditions, array $relationships = []);

    /**
     * Summary of findBy
     * @param mixed $conditions
     * @param mixed $orderBy
     * @param mixed $relationships
     * @return void
     */
    public function findBy(array $conditions, array $orderBy = [], array $relationships = []);

    /**
     * Summary of findOrNew
     * @param mixed $id
     * @return void
     */
    public function findOrNew($id);

    /**
     * Summary of findOrFail
     * @param mixed $id
     * @return void
     */
    public function findOrFail($id);

    /**
     * Summary of first
     * @return void
     */
    public function first();

    /**
     * Create
     *
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param $id
     * @param  array  $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Summary of updateOrCreate
     * @param mixed $condition
     * @param mixed $attributes
     * @return void
     */
    public function updateOrCreate(array $condition, array $attributes);

    /**
     * Delete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
