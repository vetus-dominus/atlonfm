<?php

namespace App\API\v1;

use App\Models\CType;
use CodeIgniter\RESTful\ResourceController;

class Ctypes extends ResourceController
{
    /**
     * CType model
     */
    private CType $ctype;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ctype = new CType();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $ctypes = $this->ctype->findAll();
        return $this->respond($ctypes);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $ctype = $this->ctype->find($id);

        if (isset($ctype) === true) {
            return $this->respond($ctype);
        }

        return $this->failNotFound('Ctype not found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = $this->validate(['name' => 'required']);

        if ($validation === false) {
            return $this->failValidationerrors($this->validator->getErrors());
        }

        $ctype = ['name' => $this->request->getVar('name')];
        $ctype_id = $this->ctype->insert($ctype);

        if ($ctype_id !== false) {
            $ctype['id'] = $ctype_id;
            return $this->respondCreated($ctype);
        }

        return $this->fail("Ctype don't created");
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $ctype = $this->ctype->find($id);

        if (isset($ctype) === false) {
            return $this->failNotFound('Ctype not found');
        }

        $validation = $this->validate(['name' => 'required']);

        if ($validation === false) {
            return $this->failValidationerrors($this->validator->getErrors());
        }

        $ctype = [
            'id'   => $id,
            'name' => $this->request->getVar('name'),
        ];

        $response = $this->ctype->save($ctype);

        if ($response === true) {
            return $this->respond($ctype);
        }

        return $this->fail("Ctype not updated");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $ctype = $this->ctype->find($id);

        if (isset($ctype) === false) {
            return $this->failNotFound('Ctype not found');
        }

        $response = $this->ctype->delete($id);

        if ($response === true) {
            return $this->respond($ctype);
        }

        return $this->fail("Ctype not removed");
    }
}
