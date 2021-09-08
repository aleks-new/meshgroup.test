<?php

namespace App\Services;
use App\Repositories\RowRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RowService {
    /** @var RowRepository */
    protected $rowRepository;

    public function __construct(RowRepository $rowRepository) {
        $this->rowRepository = $rowRepository;
    }

    public function saveRow($data) {
        $validator = Validator::make($data, [
            'name' => 'required',
            'date' => 'required|date_format:d.m.Y'
        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->rowRepository->save($data);
    }
}
