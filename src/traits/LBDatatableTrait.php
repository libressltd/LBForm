<?php

namespace LIBRESSLtd\LBForm\Traits;

use Auth;

trait LBDatatableTrait {

    public function scopeToOption($query, $name = "name", $value = "id")
    {
        $items = $query->get();
        $array = array();
        foreach ($items as $item)
        {
            $array[] = [
                "name" => $item->$name,
                "value" => $item->$value
            ];
        }
        return $array;
    }

    public function scopeDatatable($query, $request)
    {
        $class = get_class($this);
        $total = $class::count();
        $totalFiltered = $query->count();

        $columns = [];
        foreach ($request->columns as $column)
        {
            $data = $column["data"];
            $columns[] = $data;
            if (strlen($column["search"]["value"]) > 0)
            {
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