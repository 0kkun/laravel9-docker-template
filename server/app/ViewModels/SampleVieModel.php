<?php

namespace App\ViewModels;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PartnerViewModel
{
    /**
     * パートナー一覧を配列で返す
     * @param $partners
     * @return array
     */
    public static function toArray(LengthAwarePaginator $partners): array
    {
        $data = [];
        foreach($partners as $partner) {
            $data[] = [
                'id' => $partner['id'],
                'clientId' => $partner['client_id'],
                'name' => $partner['name'],
                'namepy' => $partner['namepy'],
            ];
        }

        return $data;
    }

    /**
     * 編集画面のパートナー一覧を配列で返す
     * @param $partners
     * @return array
     */
    public static function toArrayForEdit(Collection $partner): array
    {
        $data = [
            'id' => $partner['id'],
            'name' => $partner['name'],
            'namepy' => $partner['namepy'],
        ];

        return $data;
    }
}