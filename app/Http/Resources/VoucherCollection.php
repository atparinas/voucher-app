<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VoucherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($voucher){
                return [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'status' => $voucher->status,
                    'createdAt' => $voucher->created_at->diffForHumans(),

                ];
            }),
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'perPage' => $this->perPage(),
                'currentPage' => $this->currentPage(),
                'totalPages' => $this->lastPage(),
                'firstItem' => $this->firstItem(),
                'lastItem' => $this->lastItem(),
                'hasMorePages' => $this->hasMorePages(),
                'lastPage' => $this->lastPage(),
                'nextPageUrl' => $this->nextPageUrl(),
                'previousPageUrl' => $this->previousPageUrl(),
            ]
        ];
    }
}
