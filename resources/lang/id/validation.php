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

    'accepted' => 'Atribut :attribute harus diterima.',
    'active_url' => 'Atribut :attribute bukan URL yang valid.',
    'after' => 'Atribut :attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => 'Atribut :attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Atribut :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Atribut :attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Atribut :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Atribut :attribute harus berupa array.',
    'before' => 'Atribut :attribute harus berupa tanggal sebelum :date.',
    'before_or_equal' => 'Atribut :attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => 'Atribut :attribute harus antara :min dan :max.',
        'file' => 'Atribut :attribute harus antara :min dan :max kilobyte.',
        'string' => 'Atribut :attribute harus antara :min dan :max karakter.',
        'array' => 'Atribut :attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean' => 'Kolom :attribute harus benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => 'Atribut :attribute bukan tanggal yang valid.',
    'date_equals' => 'Atribut :attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'Atribut :attribute tidak cocok dengan format :format.',
    'different' => 'Atribut :attribute dan :other harus berbeda.',
    'digits' => 'Atribut :attribute harus :digits digit.',
    'digits_between' => 'Atribut :attribute harus antara :min dan :max digit.',
    'dimensions' => 'Atribut :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Kolom :attribute memiliki nilai duplikat.',
    'email' => 'Atribut :attribute harus berupa alamat email yang valid.',
    'ends_with' => 'Atribut :attribute harus diakhiri dengan salah satu dari berikut: :values.',
    'exists' => 'Atribut :attribute yang dipilih tidak valid.',
    'file' => 'Atribut :attribute harus berupa file.',
    'filled' => 'Kolom :attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => 'Atribut :attribute harus lebih besar dari :value.',
        'file' => 'Atribut :attribute harus lebih besar dari :value kilobyte.',
        'string' => 'Atribut :attribute harus lebih besar dari :value karakter.',
        'array' => 'Atribut :attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => 'Atribut :attribute harus lebih besar dari atau sama dengan :value.',
        'file' => 'Atribut :attribute harus lebih besar dari atau sama dengan :value kilobyte.',
        'string' => 'Atribut :attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array' => 'Atribut :attribute harus memiliki :value item atau lebih.',
    ],
    'image' => 'Atribut :attribute harus berupa gambar.',
    'in' => 'Atribut :attribute yang dipilih tidak valid.',
    'in_array' => 'Kolom :attribute tidak ada di :other.',
    'integer' => 'Atribut :attribute harus berupa bilangan bulat.',
    'ip' => 'Atribut :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Atribut :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Atribut :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Atribut :attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => 'Atribut :attribute harus kurang dari :value.',
        'file' => 'Atribut :attribute harus kurang dari :value kilobyte.',
        'string' => 'Atribut :attribute harus kurang dari :value karakter.',
        'array' => 'Atribut :attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => 'Atribut :attribute harus kurang dari atau sama dengan :value.',
        'file' => 'Atribut :attribute harus kurang dari atau sama dengan :value kilobyte.',
        'string' => 'Atribut :attribute harus kurang dari atau sama dengan :value karakter.',
        'array' => 'Atribut :attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max' => [
        'numeric' => 'Atribut :attribute tidak boleh lebih besar dari :max.',
        'file' => 'Atribut :attribute tidak boleh lebih besar dari :max kilobyte.',
        'string' => 'Atribut :attribute tidak boleh lebih besar dari :max karakter.',
        'array' => 'Atribut :attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes' => 'Atribut :attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => 'Atribut :attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'numeric' => 'Atribut :attribute harus setidaknya :min.',
        'file' => 'Atribut :attribute harus setidaknya :min kilobyte.',
        'string' => 'Atribut :attribute harus setidaknya :min karakter.',
        'array' => 'Atribut :attribute harus memiliki setidaknya :min item.',
    ],
    'not_in' => 'Atribut :attribute yang dipilih tidak valid.',
    'not_regex' => 'Format atribut :attribute tidak valid.',
    'numeric' => 'Atribut :attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Kolom :attribute harus ada.',
    'regex' => 'Format atribut :attribute tidak valid.',
    'required' => 'Kolom :attribute wajib diisi.',
    'required_if' => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_unless' => 'Kolom :attribute wajib diisi kecuali :other ada di :values.',
    'required_with' => 'Kolom :attribute wajib diisi bila :values ada.',
    'required_with_all' => 'Kolom :attribute wajib diisi bila :values ada.',
    'required_without' => 'Kolom :attribute wajib diisi bila :values tidak ada.',
    'required_without_all' => 'Kolom :attribute wajib diisi bila tidak ada satupun dari :values yang ada.',
    'same' => 'Atribut :attribute dan :other harus cocok.',
    'size' => [
        'numeric' => 'Atribut :attribute harus berukuran :size.',
        'file' => 'Atribut :attribute harus berukuran :size kilobyte.',
        'string' => 'Atribut :attribute harus berukuran :size karakter.',
        'array' => 'Atribut :attribute harus mengandung :size item.',
    ],
    'starts_with' => 'Atribut :attribute harus dimulai dengan salah satu dari berikut: :values.',
    'string' => 'Atribut :attribute harus berupa string.',
    'timezone' => 'Atribut :attribute harus berupa zona yang valid.',
    'unique' => 'Atribut :attribute sudah ada.',
    'uploaded' => 'Atribut :attribute gagal diunggah.',
    'url' => 'Format atribut :attribute tidak valid.',
    'uuid' => 'Atribut :attribute harus berupa UUID yang valid.',

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
            'rule-name' => 'pesan-kustom',
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
