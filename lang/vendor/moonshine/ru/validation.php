<?php

declare(strict_types=1);

return [
    'required'  => 'Поле :attribute обязательно для заполнения.',
    'email'     => 'Поле :attribute должно содержать корректный email.',
    'unique'    => 'Такое значение :attribute уже существует.',
    'min'       => [
        'string'  => 'Поле :attribute должно содержать не менее :min символов.',
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file'    => 'Файл :attribute должен быть не менее :min килобайт.',
        'array'   => 'Поле :attribute должно содержать не менее :min элементов.',
    ],
    'max'       => [
        'string'  => 'Поле :attribute не должно превышать :max символов.',
        'numeric' => 'Поле :attribute не должно превышать :max.',
        'file'    => 'Файл :attribute не должен превышать :max килобайт.',
        'array'   => 'Поле :attribute не должно содержать более :max элементов.',
    ],
    'attributes' => [],
];
