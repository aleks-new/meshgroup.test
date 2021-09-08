<?php

namespace App\Repositories;
use App\Models\Row;

class RowRepository {
    /** @var Row */
    protected $row;
    public function __construct(Row $row) {
        $this->row = $row;
    }

    public function save($data) {
        $row = new $this->row;
        $row->fill($data)->save();

        return $row->fresh();
    }
}
