<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Este campo ha sido aceptado.', 
    'accepted_if' => 'Este campo debe se aceptado cuando :otro es :validado.',//igual a :valor
    'active_url' => 'El campo debe ser una URL válida.',
    'after' => '    El campo debe ser posterior a la fecha determinada.',
    'after_or_equal' => 'El campo debe ser posterior o igual a la fecha determinada.',
    'alpha' => 'El campo debe contener únicamente letras.',
    'alpha_dash' => 'El campo debe contener sólo letras, números, guiones cortos y guiones bajos.',
    'alpha_num' => 'El campo debe contener sólo letras y numeros.',
    'array' => 'El campo debe contener un array.',
    'ascii' => 'El campo debe contener sólo carácteres alfanuméricos y símbolos de un solo byte (carácteres ASCII).',
    'before' => 'El campo debe ser una fecha anterior a la indicada.', //anterior o inferior
    'before_or_equal' => 'El campo debe ser anterior o igual a la fecha dada.',
    'between' => [
        'array' => 'Este campo debe tener entre :min y :max elementos.',
        'file' => 'Este campo debe tener entre :min y :max kilobytes.',
        'numeric' => 'Este campo debe estar entre :min y :max.',
        'string' => 'Este campo debe tener entre :min y  :max caracteres.',//se debe definir el max y min
    ],
    'boolean' => 'Este campo debe ser verdadero o falso.',
    'can' => 'El campo contiene un valor no autorizado',
    'confirmed' => 'La confirmación del campo no conincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El campo debe ser una fecha válida.',
    'date_equals' => 'El campo debe ser una fecha igual a :fecha.',//se debe definir fecha
    'date_format' => 'El campo debe coincidir con el formato :formato.',//se debe definir formato
    'decimal' => 'El campo debe tener :decimal número de decimales.',//se debe definir el no de decimales
    'declined' => 'El campo debe ser declinado.',//o rechazado
    'declined_if' => 'El campo debe ser declinado cuando :otro es :valor.',
    'different' => 'El campo y :otro deben ser diferentes.',
    'digits' => 'El campo debe tener :dígitos dígitos.',//estension exacta de digitos
    'digits_between' => 'El campo debe de tener entre :min y :max de dígitos.',
    'dimensions' => 'El campo tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo tiene un valor duplicado.',
    'doesnt_end_with' => 'Este campo no debe de terminar con uno de los siguientes: :valores.',
    'doesnt_start_with' => 'Este campo no debe empezar con uno de los siguientes: :valores.',
    'email' => 'El campo debe ser un correo electrónico válido.',
    'ends_with' => 'El campo debe de terminar con uno de los siguientes: :valores.',
    'enum' => 'El campo seleccionado es inválido.',
    'exists' => 'El campo seleccionado es inválido.',//base de datos
    'extensions' => 'Este campo debe tener una de las siguientes extensiones: :valores.',
    'file' => 'Este campo debe ser un archivo.',
    'filled' => 'Este campo debe de tener un valor.',
    'gt' => [
        'array' => 'El campo debe tener más que :valor del elemento.',
        'file' => 'El campo debe ser más grande que :valor en kilobytes.',
        'numeric' => 'El campo debe ser más grande que :valor.',
        'string' => 'El campo debe ser más grande que :valor de los caracteres.',
    ],
    'gte' => [
        'array' => 'El campo debe tener :valor de los elementos o más.',
        'file' => 'El campo debe ser más grande o igual que :valor kilobytes.',
        'numeric' => 'El campo debe ser más grande o igual que :valor.',
        'string' => 'El campo debe ser más grande o igual que :valor de los caracteres.',
    ],
    'hex_color' => 'El campo debe ser un color hexadecimal válido.',
    'image' => 'El campo debe ser una imagen.',
    'in' => 'El campo seleccionado es inválido.',
    'in_array' => 'Este campo debe de existir en :otro.',//en otros archivos
    'integer' => 'Este campo debe ser un entero.',
    'ip' => 'El campo debe ser una direccion IP valida.',
    'ipv4' => 'El campo debe ser una direccion IPv4 valida.',
    'ipv6' => 'El campo debe ser una direccion IPv6 valida.',
    'json' => 'Este campo debe ser una cadena JSON válida.',
    'lowercase' => 'Esto campo debe estar en letras minúsculas.',
    'lt' => [
        'array' => 'Este campo debe ser menor que :valor de los elementos.',
        'file' => 'Este campo debe ser menor que :valor kilobytes.',
        'numeric' => 'Este campo debe ser menor que :valor.',
        'string' => 'Este campo debe ser menor que :valor de los caracteres.',
    ],
    'lte' => [
        'array' => 'Este campo no debe más que :valor de los elementos.',
        'file' => 'Este campo debe ser menor o igual a :valor kilobytes.',
        'numeric' => 'Este campo debe ser menor o igual a :valor.',
        'string' => 'Este campo debe ser menor o igual a :valor de los elementos.',
    ],
    'mac_address' => 'El campo debe ser una direccion MAC valida.',
    'max' => [
        'array' => 'Este campo no debe tener más que :max elementos.',
        'file' => 'Este campo no debe ser mayor que :max kilobytes.',
        'numeric' => 'Este campo no debe ser mayor que :max.',
        'string' => 'Este campo no debe ser mayor que :max caracteres.',
    ],
    'max_digits' => 'El campo no debe tener más que :max dígitos.',
    'mimes' => 'El campo debe ser un archivo del tipo: :valores.',
    'mimetypes' => 'El campo debe ser un archivo del tipo: :valores.',
    'min' => [
        'array' => 'El campo debe tener al menos :min elementos.',
        'file' => 'El campo debe ser de al menos :min kilobytes.',
        'numeric' => 'El campo debe ser de al menos :min.',
        'string' => 'El campo debe ser de al menos :min caracteres.',
    ],
    'min_digits' => 'El campo debe tener al menos :min dígitos.',
    'missing' => 'El campo no esta presente',// falta el campo o debe faltar el campo
    'missing_if' => 'Debe faltar el campo cuando :otro es :valor.',
    'missing_unless' => 'Debe faltar el campo a menos que :otro es :valor.',
    'missing_with' => 'Debe faltar el campo cuando :valores están presentes.',
    'missing_with_all' => 'Debe faltar el campo cuando :valores están presentes.',
    'multiple_of' => 'Este campo debe ser múltiplo de :valor.',
    'not_in' => 'El campo seleccionado es inválido.',
    'not_regex' => 'El formato del campo es invalido.',
    'numeric' => 'El campo debe ser un número.',
    'password' => [
        'letters' => 'El campo debe contener al menos una letra.',
        'mixed' => 'El campo debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El campo debe contener al menos un número.',
        'symbols' => 'El campo debe contener al menos un simbolo.',
        'uncompromised' => 'Este campo ha aparecido en una fuga de datos. Porfavor escoja uno diferente :atributo.',
    ],
    'present' => 'El campo debe estar presente.',
    'present_if' => 'El campo debe estar presente cuando :otro es :valor.',
    'present_unless' => 'El campo debe estar presente a menos que :otro es :valor.',
    'present_with' => 'El campo debe estar presente cuando :valores presentes.',
    'present_with_all' => 'El campo debe estar presente cuando :valores están presentes.',
    'prohibited' => 'Este campo esta prohibido.',
    'prohibited_if' => 'Este campo esta prohibido cuando :otro es :valor.',
    'prohibited_unless' => 'Este campo esta prohibido a menos que :otro esta en :valores.',
    'prohibits' => 'El campo prohibe :otro esté presente.',
    'regex' => 'El formato del campo es inválido.',
    'required' => 'Se requiere este campo.',
    'required_array_keys' => 'El campo debe tener entradas para: :valores.',
    'required_if' => 'Este campo es requerido cuando :otro es :valor.',
    'required_if_accepted' => 'Este campo es requerido cuando :otro es aceptado.',
    'required_unless' => 'Este campo es requerido a menos que :otro esta en :valores.',
    'required_with' => 'Este campo es requerido cuando :los valores estan presentes.',
    'required_with_all' => 'Este campo es requerido cuando :los valores estan presentes.',
    'required_without' => 'Este campo es requerido cuando :los valores no estan presentes.',
    'required_without_all' => 'Este campo es requerido cuando ninguno de :los valores estan presentes.',
    'same' => 'Este campo debes corresponder con :otro.',
    'size' => [
        'array' => 'El campo debe tener :tamaño de los elementos.',
        'file' => 'El campo debe tener :tamaño kilobytes.',
        'numeric' => 'El campo debe tener :tamaño.',
        'string' => 'El campo debe tener :tamaño de carácteres.',
    ],
    'starts_with' => 'El campo debe comenzar con uno de los siguientes: :valores.',
    'string' => 'El campo debe ser una cadena de carácteres.',
    'timezone' => 'El campo debe ser una zona horaria válida.',//o correcta
    'unique' => 'El campo ya se ha tomado.',
    'uploaded' => 'El campo no se puede cargar.',
    'uppercase' => 'El campo debe estar en mayúsculas.',
    'url' => 'El campo debe ser una URL válida.',
    'ulid' => 'El campo debe ser una ULID válida.',
    'uuid' => 'El campo debe ser una UUID válida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
