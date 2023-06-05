<?php

namespace App\API\v1;

use App\Models\Construction;
use CodeIgniter\RESTful\ResourceController;

class Constructions extends ResourceController
{
    /**
     * Construction model
     */
    private Construction $construction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->construction = new Construction();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->construction->db->table('constructions as const');
        $data->select(
            'const.ctype_id as ctype_id,' .
            'ct.name as ctype_name,' .
            'const.id as const_id,' .
            'const.name as const_name,' .
            'const.price as const_price'
        );
        $data->join('ctypes as ct', 'ct.id = const.ctype_id', 'left');
        $data->orderBy('ct.id');
        $constructions = $data->get()->getResult();
        return $this->respond($constructions);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->construction->db->table('constructions as const');
        $data->select(
            'const.ctype_id as ctype_id,' .
            'ct.name as ctype_name,' .
            'const.id as const_id,' .
            'const.name as const_name,' .
            'const.price as const_price'
        )->where('const.id', $id);

        $data->join('ctypes as ct', 'ct.id = const.ctype_id', 'left');
        $data->orderBy('ct.id');
        $construction = $data->get()->getResult();

        if (count($construction) > 0) {
            return $this->respond($construction);
        }

        return $this->failNotFound('Construction not found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = $this->validate([
            'ctype_id' => 'required',
            'name'     => 'required',
            'price'    => 'required',
        ]);

        if ($validation === false) {
            return $this->failValidationerrors($this->validator->getErrors());
        }

        $construction = [
            'ctype_id' => $this->request->getVar('ctype_id'),
            'name'     => $this->request->getVar('name'),
            'price'    => $this->request->getVar('price'),
        ];
    
        $construction_id = $this->construction->insert($construction);

        if ($construction_id !== false) {
            $construction['id'] = $construction_id;
            return $this->respondCreated($construction);
        }

        return $this->fail("Construction don't created");
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $construction = $this->construction->find($id);

        if (isset($construction) === false) {
            return $this->failNotFound('Construction not found');
        }

        $validation = $this->validate([
            'ctype_id' => 'required',
            'name'     => 'required',
            'price'    => 'required',
        ]);

        if ($validation === false) {
            return $this->failValidationerrors($this->validator->getErrors());
        }

        $construction = [
            'id'       => $id,
            'ctype_id' => $this->request->getVar('ctype_id'),
            'name'     => $this->request->getVar('name'),
            'price'    => $this->request->getVar('price'),
        ];

        $response = $this->construction->save($construction);

        if ($response === true) {
            return $this->respond($construction);
        }

        return $this->fail("Construction not updated");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $construction = $this->construction->find($id);

        if (isset($construction) === false) {
            return $this->failNotFound('Construction not found');
        }

        $response = $this->construction->delete($id);

        if ($response === true) {
            return $this->respond($construction);
        }

        return $this->fail("Construction not removed");
    }
}
