<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{ // c'est la ou je crée ma table 
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
