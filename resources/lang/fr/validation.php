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

    'accepted' => 'le:attribute doit être accepté.',
    'accepted_if' => 'le:attribute doit être accepté lorsque :other est :value.',
    'active_url' => 'le:attribute n\'est pas une URL valide.',
    'after' => 'le:attribute doit être une date après :date.',
    'after_or_equal' => 'le:attribute doit être une date après ou egal a :date.',
    'alpha' => 'le :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'le:attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'le:attribute ne doit contenir que des lettres et des chiffres.',
    'array' => 'le:attribute doit être un tableau.',
    'before' => 'le:attribute doit être une date avant :date.',
    'before_or_equal' => 'le:attribute doit être une date avant ou egal a :date.',
    'between' => [
        'numeric' => 'le :attribute doit être entre  :min et :max.',
        'file' => 'le:attribute doit être entre :min et :max kilobytes.',
        'string' => 'le :attribute doit être entre :min et :max lettres.',
        'array' => 'le :attribute doit être entre  :min et :max articles.',
    ],
    'boolean' => 'le:attribute champ doit être vrai ou faux.',
    'confirmed' => 'le :attribute la confirmation ne correspond pas.',
    'current_password' => 'le Le mot de passe est incorrect.',
    'date' => 'le :attribute la date n\'est pas valide.',
    'date_equals' => 'le :attribute doit être une date égale à :date.',
    'date_format' => 'le :attribute ne correspond pas au format :format.',
    'declined' => 'le :attribute doit être refusé.',
    'declined_if' => 'le :attribute doit être refusé lorsque :other est :value.',
    'different' => 'le :attribute et :other doit être différent.',
    'digits' => 'le:attribute doit être :digits numero.',
    'digits_between' => 'le :attribute doit être entre  :min et :max digits.',
    'dimensions' => 'le :attribute a des dimensions d\'image non valides.',
    'distinct' => 'le :attribute champ a une valeur en double.',
    'email' => 'le :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'le :attribute doit se terminer par leun des éléments suivants : :values.',
    'enum' => 'le :attribute choisi  is invalide.',
    'exists' => 'le :attribute choisi est invalide.',
    'file' => 'le :attribute doit être un fichier.',
    'filled' => 'le :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'le :attribute doit être supérieur à :value.',
        'file' => 'le :attribute doit être supérieur à :value kilobytes.',
        'string' => 'le :attribute doit être supérieur à :value characterlettress.',
        'array' => 'le :attribute must doit être supérieur à :value articles.',
    ],
    'gte' => [
        'numeric' => 'le :attribute doit être supérieur ou egal a  :value.',
        'file' => 'le:attribute doit être supérieur ou egal a :value kilobytes.',
        'string' => 'le :attribute doit être supérieur ou egal a :value lettres.',
        'array' => 'le :attribute doit avoir :value article ou plus.',
    ],
    'image' => 'le :attribute doit etre une image.',
    'in' => 'le  :attribute choisi est invalide.',
    'in_array' => 'le :attribute field does not exist in :other.',
    'integer' => 'le :attribute must be an integer.',
    'ip' => 'le:attribute must be a valid IP address.',
    'ipv4' => 'le :attribute must be a valid IPv4 address.',
    'ipv6' => 'le :attribute must be a valid IPv6 address.',
    'mac_address' => 'le :attribute must be a valid MAC address.',
    'json' => 'le :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'le :attribute must be less than :value.',
        'file' => 'le :attribute must be less than :value kilobytes.',
        'string' => 'le :attribute must be less than :value characters.',
        'array' => 'le :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'le :attribute must be less than or equal to :value.',
        'file' => 'le :attribute must be less than or equal to :value kilobytes.',
        'string' => 'le :attribute doit comporter au moins :value caractères.',
        'array' => 'le :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'le :attribute ne doit pas être supérieur à :max.',
        'file' => 'le :attribute ne doit pas être supérieur à :max kilobytes.',
        'string' => 'le :attribute ne doit pas être supérieur à :max caracters.',
        'array' => 'le :attribute ne doit pas être supérieur à :max items.',
    ],
    'mimes' => 'le:attribute must be a file of type: :values.',
    'mimetypes' => 'le :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'le :attribute doit être au moins :min.',
        'file' => 'le :attribute doit être au moins :min kilobytes.',
        'string' => 'le :attribute doit être au moins de longeur de :min caracteres.',
        'array' => 'le :attribute doit être au moins :min items.',
    ],
    'multiple_of' => 'le :attribute must be a multiple of :value.',
    'not_in' => 'le selected :attribute est invalide.',
    'not_regex' => 'le :attribute format est invalide.',
    'numeric' => 'le :attribute doit etre un digit.',
    'password' => 'le password est incorrecte.',
    'present' => 'le :attribute champ doit etre existant.',
    'prohibited' => 'le :attribute field is prohibited.',
    'prohibited_if' => 'le :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'le :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'le :attribute field prohibits :other from being present.',
    'regex' => 'le :attribute format is invalid.',
    'required' => 'le Champ :attribute est requis.',
    'required_if' => 'le champ :attribute est requis quand :other est :value.',
    'required_unless' => 'le :attribute field is required unless :other is in :values.',
    'required_with' => 'le :attribute field is required when :values is present.',
    'required_with_all' => 'le :attribute field is required when :values are present.',
    'required_without' => 'le :attribute field is required when :values is not present.',
    'required_without_all' => 'le :attribute field is required when none of :values are present.',
    'same' => 'le :attribute and :other must match.',
    'size' => [
        'numeric' => 'le :attribute must be :size.',
        'file' => 'le :attribute must be :size kilobytes.',
        'string' => 'le :attribute must be :size characters.',
        'array' => 'le :attribute must contain :size items.',
    ],
    'starts_with' => 'le :attribute must start with one of the following: :values.',
    'string' => 'le :attribute doit être une chaîne.',
    'timezone' => 'le :attribute must be a valid timezone.',
    'unique' => 'le :attribute a déjà été pris.',
    'uploaded' => 'le :attribute failed to upload.',
    'url' => 'le:attribute must be a valid URL.',
    'uuid' => 'le :attribute must be a valid UUID.',

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
