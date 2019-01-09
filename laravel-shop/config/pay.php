<?php

return [
    'alipay' => [
        'app_id'        => '2016092500593722',
        'ali_pulic_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyiM7M1OQ9ppXeHjSzc9liib2seAUWxm89D0Ar2W/5OV1hxkwKtyA0ao2MQVfZzb6sFG1EhpoDI8h8BXtVub8jPp7iCXWFI4eedL8O06Z8EueuNyAae1TGRPhjoXlEmli2fcKf+QHyRxm01NjZq1WpMdvOXN/v9uNbEwyyS8tuFdt3a8yP1f34sx5R9wBazFIvjHszSlAgieuiFFR5UOzxtuFmOXh+wuvwLgqN/eANbDp6gv/CJl2rJnbrAiRKbINwwfXIkMUmmdXaCQvlHRnZwVl2kkfAQ73UuhriBLIpOiaFpZg255KBRDULPPLXqxeyC34K3p7irCaPBsOUkbhkQIDAQAB',
        'private_key'   => 'MIIEpAIBAAKCAQEAymKGpjxLemYqGJydvoK9JnrLu8/6dEYHyALdRLnNZX7XWHv587BhqSGmjl8IKn66dVr4i++JAcMGeghH1cc/iU5dUYszCfnh+gIHuwhWbgT/0DlG7JkT2CkA7djjOfv4Lp0FLEf1Yz0vaFYY1TCjrpyI9sbloruEce/DmU6rslOhRGy3KlMXTbX/9SmvGzVDrRKAtVV9srzWw/SM//XWrpHi2Pp64GBgvvtkFsxaj5Eu4r9hQsdWsFb5xgsTMq9aKbB8MeEaS9ytksm7zaWVoHr8BWCj4axe9RSx1xgbxzIp8Cb3KPoQVZM72P8GzllfwF/f4NrQDhTt/8ckkdyzPQIDAQABAoIBAHhq2xb59SbkttNiDHGYNJc6pRIgkzKvoF2fZqxHqTBkohjh2zzli5YokYNQg/lU4fiFojEQ2wITWj0txCAsp185I0kre7jJ12z73EGqmlJn4xWvnsWT5zzMWOMsEzci9u41Oyi3wAfGFfkMkUX35Mw2E0BR47xJumpYcJc9OeelzvqXnOXaR7b3RtnBIjVLhgmfD5TVDeCib0Z7kXY/B4Mv10U83/7FmEoOOODG1+65/i+tLBqUEI9S1jwxfPqrfg62TfkLbjUWl8H+E0+wzJpk7CPtiqqZIqHkWRBRC9qNoQMlr+qnAYW/BF1g/mF0tVLR4eIaD42Ab7/BZUW5xQECgYEA+IXN6Q2JmACghPBVEMG9fWBA0MG5h6fGH449KJ/iFlXDLnflVwbu+LJ9aJic0+rYCUi0eEZYoyQ+Eqll4//TG/PaA8+Y3BsA+YnMLtrX91SwPoFHlkalg7RIidGEZmPyabhAPQPnpVtIG0fz3YZTlX7X5ZvcozbM5XkzSIdFAWECgYEA0HlawSgLi456oxKJ4a2v2FVfbu5x4x/MokYz0IEBKRkyHExB0Gi8X4DZTAbzr9X2SdEq4jZmuU1kKwp5jt1M+W7OtK6jbJOXnhPZqDix1TZC8anm4O+FZcHSX7CII8NThx+AL6vVow1Nb/m/i73wIhmsSow84yuNHchCtT9RE10CgYEA0hfzkcBDAIAPMzMlBoxyT4pOYOxUlqyrncOWSkCXVcBcx2zOMXsIDLB/uivB8JjI11hiUIdPqWMbIpWYMF31rtzAApa+J9ygP1RRi46wIkOy1rRdu1mv1J5U8EVyA0kdBmifzbT+YFjBpWZ3b19+S5Q2mcHgjQ3nu1pxky/fkyECgYBKMaZW8AWL2V1UBBkGNGZMu7WHKV1m075kUk/GeOMM2Wa4I3uYzG2eH6E2KZM4lRFeHA8DCxFsCVsI5mV0rtXiP8lZDH4k+jIPlEj2UZcYpoMUtr7wds4m9OAGJjGNaMqlYFSioqkZqnZQz7WX6jU4LaLftSFGSA2k98yl7K7SEQKBgQC9bVEgVnTCcu1+oAX8uvJ0FraQ1Ka9XkXft6yg4QOoOEtaGfmUszGQJMoj9FivItPH5VDyLCpX4TbO9nsnog61zH6/KslpCELvQGt7CTgu9X890I68/tAWKOVCJPRSqV891PWdf2sD+FZajQqmZcI5/cwT/r8lUL3DnEsnDtw+cg==',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' =>[
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];