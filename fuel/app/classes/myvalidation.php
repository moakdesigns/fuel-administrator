<?php 
class Myvalidation
{

    static function _validation_unique($val, $options)
    {
        list($table, $field) = explode('.', $options);

        $result = DB::select("LOWER (\"$field\")")
            ->where($field, '=', Str::lower($val))
            ->from($table)->execute();

        Validation::active()->set_message('unique', 'The :label is already in use. Please choose another one.');
        return ! ($result->count() > 0);
    }

}
