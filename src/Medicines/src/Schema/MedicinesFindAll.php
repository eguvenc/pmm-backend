<?php

namespace Medicines\Schema;

/**
 * @OA\Schema()
 */
class MedicinesFindAll
{
    /**
    *  @var array
    *  @OA\Property(
    *      type="array",
    *      @OA\Items(
    *           @OA\Property(
    *             property="id",
    *             type="string",
    *           ),
    *            @OA\Property(
    *             property="name",
    *             type="string",
    *           )
    *     ),
    *  )
    */
    public $data;
}
