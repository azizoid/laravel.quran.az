<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => "Müqəddəs Quran - Öz kitabını oxu", // set false to total remove
            'description' => 'Müqəddəs Quranın azərbaycan və rus dillərinə tərcüməsinin axtarış sistemi', // set false to total remove
            'separator'   => ' - ',
            'keywords'    => ['quran', 'müqəddəs quran', 'axtarış', 'fatihə', 'ixlas', 'yasin', 'islam', 'quran oxu', 'azerbaycan dilinde quran', 'azerbaycan', 'alixan musayev', 'elmir kuliyev', 'azeri dilin', 'tefsir', 'tercume'],
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null
        ]
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => ' Müqəddəs Quran. Öz Kitabını oxu.', // set false to total remove
            'description' => 'Müqəddəs Quranın azərbaycan və rus dillərinə tərcüməsinin axtarış sistemi', // set false to total remove
            'url'         => 'http://quran.az',
            'type'        => 'article',
            'site_name'   => false,
            'images'      => ['http://quran.az/img/kuran.jpg'],
        ]
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ]
    ]
];
