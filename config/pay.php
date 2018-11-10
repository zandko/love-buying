<?php

return [
    'alipay' => [
        'app_id' => '2016091700531963',
        'ali_public_key' => '
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1eJ+JVFK/kGDq3B56yQ70SAQzB0PJwmmOeDBKZZc7wYOvWF/gkoW9ajJS2dWLG02NdbmASzLFmND5mTFByRUCTU3mffGDiJuIL3k+j3Bej3Ul/QrsAZbLcgagO0oB0aDDHZciV55RWgvwJZNsa33jYZmdE2v7qhlRH6/UR8gqSwrQOdAQcsHPUgCyqIhEgxNgpWJaXWZ9h87CWiCPJkbe5LwCabetBQlNaHU86fOyXJMJdKoG3Do9XbHAd5gFi/zkUQJP9OLeeJojtiIBteLe3kqFeM38xlqJPq3dQJjDAgIj9980yPXikHsxvYTZRZGNPcYBHsZECTKIbp5TudL6QIDAQAB',
        'private_key' => 'MIIEogIBAAKCAQEAroVhz0eUmrnR/2eMp5OG0PAwFX/BxqPAc6pwEp574diO+gtaRWhyYjUogjQ35bwD3fO6MJYNlZFEhIi1ZFazhEkazwu259in3cXcFM7GR7/fIw8lGiJoZ7vQBKhqkQddxhePQy9SwtFDoVVzQkmUVNf+nxDrlMq0CVHS8alcR2sQ13+rJxh63LWWY0Hg+meNhREf+vrzg7y3U8xsdpktJ/RqEc8OSiPYn5tPc2HvPnfw0M/cxOdc6xYoo5MpoiPMVKYjGDphBmR8DxQBsmnrxK4wrvh9nEJ3drUH0f8PoMga988q5N4Kjp0Dd3VUBTaXdKjMWsZVYaA9y3WnRnzotwIDAQABAoIBAE1PeQzBwOrp9kUWMhDqIYbdX++mMMk2MUML9anJ20cpD+1kqhClPEaVFeTYDQsQRwZDue9cCZiAScIMbY6NeejYGbAumFAMghCUXfI5x0xxiv+U7fKt22JYqMXndY3ZnYjrVuOESz1SRotpty1eOv96z6jXbgTz5t1aCgBT7jUUVY/uLQdPNhxf3M6tcnGkvy95jaEZBcpJ0iQ2LJ+kYsvMLqHSobLRHP3m5noyexTb82p3o1TnpQYVQ1tQQLamWTORxMlgObZZBrkp9XAYGXo7nKG08cv9MLdAKBaiMEu1oJyAPvDJPE4Xd8n4Or7Ed6XoRmpVO9Fz/dIMTzFQGAECgYEA1jchC3UMQYtnJu+7ldG+Giad8XZipQ5iysSgHTae3CTaRHzsnz85jXfBb8Xc+7gK2XVQL6iI/8g02/lzNq3M558pvMtWNAVI+lxDKM1f026x2n4C/WxWL9BVhOzFpka83BWBaPZkSFJI+D5Tg3anzwBA9eF6V0Fw6EoSwDZzyzcCgYEA0JAcn11t8tBNJ7jZK+qXYmbEePzh5HlOGrYuNPTpS0vpT0o9MPzIJwvhvGWOo784vvsuSgdSEoWesb9TjQebHBFyl0zGzYB70s2vxmT0kM1wvg3Qk2/qDTOFiiwHegS0lLdD2egyHOOfZvybLWZtAcj8tzNJQf/gwXQI8xNtjoECgYBL3VZcomVmySINDhYXJyL2S/rfyxeAcSnXue8iqXd1a6/JVZzPgSq2yVS+awqqMzHUddGiL0PlolfmF+AP21mYJiw36qNq5PxFfmtihemMDcX7JWmVqsqTQGspGlmdW6wDHbKpI6m8WzfwgtI82sbvbp2S9vnG8Sw1eBZP8Hjt3QKBgF7C685Y9AjcLgI7UalLiIb0LJbQR464sw0d83aqRImqrxIQqCbm48Yh9unTtvCdhJn5pHmMQ/UYcxdN2Bd++jHRl6A5CSb8FsacIB5jZl+YiH5B5p/mvJBM9YLnKGp/UtEzR4ftoT9RCO8RHSyOmj6yZGiUy9dJ/IPJRfuzuxaBAoGAe4+Hf7ilgd7qf8Rl1GxZL9oP/AT92ZEuzrujKZaQyp2Io8Dm7H1rbRkqct8u0wNTaOzCQ4W9OFZpaluQrd6/+vnwBanFcm7g0JRghtSPcfuKu35lgvpngM2/yHFSIsyL8HKLnP881jtp9mYqoHPqKTnm8KFHBM3FCTeIiQIdc40=',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id' => '',
        'mch_id' => '',
        'key' => '',
        'cert_client' => '',
        'cert_key' => '',
        'log' => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];