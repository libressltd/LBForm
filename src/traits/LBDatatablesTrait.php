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
                $data = $column["data"];
                if (strpos($data, ".") === false)
                {
                    $query = $query->where($column["data"], "like", "%".$column["search"]["value"]."%");
                }
                else
                {
                    $comps = explode(".", $data);
                    $last = $comps[count($comps) - 1];
                    $data = substr($data, 0, strlen($data) - strlen($last) - 1);
                    $value = $column["search"]["value"];
                    $query = $query->whereHas($data, function($query) use ($last, $value) {
                        $query->where($last, "like", "%$value%");
                    });
                }
            }
        }

        $data = $query->offset($request->start)->limit($request->length)->get();

        return ["draw" => $request->draw, "recordsTotal" => $total, "recordsFiltered" => $totalFiltered, "data" => $data];
    }
}