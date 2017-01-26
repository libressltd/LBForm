<?php

namespace LIBRESSLtd\LBForm\Traits;

use Auth;

trait LBDatatableTrait {
    public function scopeDatatable($query, $request)
    {
        $class = get_class($this);
        $total = $class::count();
        $totalFiltered = $query->count();

        foreach ($request->columns as $column)
        {
            if (strlen($column["search"]["value"]) > 0)
            {
                $query = $query->where($column["data"], "like", "%".$column["search"]["value"]."%");
            }
        }

        $data = $query->offset($request->start)->limit($request->length)->get();

        return ["draw" => $request->draw, "recordsTotal" => $total, "recordsFiltered" => $totalFiltered, "data" => $data];
    }
}