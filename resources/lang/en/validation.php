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

    'accepted'             => ':attribute 必须接受',
    'active_url'           => ':attribute 必须是一个合法的 URL',
    'after'                => ':attribute 必须是 :date 之后的一个日期',
    'after_or_equal'       => ':attribute 必须是 :date 之后或相同的一个日期',
    'alpha'                => ':attribute 只能包含字母',
    'alpha_dash'           => ':attribute 只能包含字母、数字、中划线或下划线',
    'alpha_num'            => ':attribute 只能包含字母和数字',
    'array'                => ':attribute 必须是一个数组',
    'before'               => ':attribute 必须是 :date 之前的一个日期',
    'before_or_equal'      => ':attribute 必须是 :date 之前或相同的一个日期',
    'between'              => [
        'numeric' => ':attribute 必须在 :min 到 :max 之间',
        'file'    => ':attribute 必须在 :min 到 :max KB 之间',
        'string'  => ':attribute 必须在 :min 到 :max 个字符之间',
        'array'   => ':attribute 必须在 :min 到 :max 项之间',
    ],
    'boolean'              => ':attribute 字符必须是 true 或 false',
    'confirmed'            => ':attribute 二次确认不匹配',
    'date'                 => ':attribute 必须是一个合法的日期',
    'date_format'          => ':attribute 与给定的格式 :format 不符合',
    'different'            => ':attribute 必须不同于 :other',
    'digits'               => ':attribute 必须是 :digits 位.',
    'digits_between'       => ':attribute 必须在 :min 和 :max 位之间',
    'dimensions'           => ':attribute 具有无效的图片尺寸',
    'distinct'             => ':attribute 字段具有重复值',
    'email'                => ':attribute 必须是一个合法的电子邮件地址',
    'exists'               => '选定的 :attribute 是无效的.',
    'file'                 => ':attribute 必须是一个文件',
    'filled'               => ':attribute 的字段是必填的',
    'image'                => ':attribute 必须是 jpeg, png, bmp 或者 gif 格式的图片',
    'in'                   => '选定的 :attribute 是无效的',
    'in_array'             => ':attribute 字段不存在于 :other',
    'integer'              => ':attribute 必须是个整数',
    'ip'                   => ':attribute 必须是一个合法的 IP 地址。',
    'json'                 => ':attribute 必须是一个合法的 JSON 字符串',
    'max'                  => [
        'numeric' => ':attribute 的最大长度为 :max 位',
        'file'    => ':attribute 的最大为 :max',
        'string'  => ':attribute 的最大长度为 :max 字符',
        'array'   => ':attribute 的最大个数为 :max 个.',
    ],
    'mimes'                => ':attribute 的文件类型必须是 :values',
    'min'                  => [
        'numeric' => ':attribute 的最小长度为 :min 位',
        'file'    => ':attribute 大小至少为 :min KB',
        'string'  => ':attribute 的最小长度为 :min 字符',
        'array'   => ':attribute 至少有 :min 项',
    ],
    'not_in'               => '选定的 :attribute 是无效的',
    'numeric'              => ':attribute 必须是数字',
    'present'              => ':attribute 字段必须存在',
    'regex'                => ':attribute 格式是无效的',
    'required'             => ':attribute 字段是必须的',
    'required_if'          => ':attribute 字段是必须的当 :other 是 :value',
    'required_unless'      => ':attribute 字段是必须的，除非 :other 是在 :values 中',
    'required_with'        => ':attribute 字段是必须的当 :values 是存在的',
    'required_with_all'    => ':attribute 字段是必须的当 :values 是存在的',
    'required_without'     => ':attribute 字段是必须的当 :values 是不存在的',
    'required_without_all' => ':attribute 字段是必须的当 没有一个 :values 是存在的',
    'same'                 => ':attribute 和 :other 必须匹配',
    'size'                 => [
        'numeric' => ':attribute 必须是 :size 位',
        'file'    => ':attribute 必须是 :size KB',
        'string'  => ':attribute 必须是 :size 个字符',
        'array'   => ':attribute 必须包括 :size 项',
    ],
    'string'               => ':attribute 必须是一个字符串',
    'timezone'             => ':attribute 必须是个有效的时区.',
    'unique'               => ':attribute 已存在',
    'url'                  => ':attribute 无效的格式',
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
| The following language lines are used to swap attribute place-holders
| with something more reader friendly such as E-Mail Address instead
| of "email". This simply helps us make messages a little cleaner.
|
*/
    'attributes' => [
        'user_number'                         => '学号',
        'user_password'                       => '密码',
        'new_password'                        => '新密码',
        'new_password_confirmation'           => '确认密码',
        'category_id'                         => '分类id',
        'title'                               => '标题',
        'intro'                               => '简介',
        'content'                             => '文章内容',
        'picture_id'                          => '图片id',
        'video'                               => '视频id',
        'search_content'                      => '搜索内容',
        'search_content'                      => '搜索内容',
        'article_top_sate'                    => '推荐状态',
        'article_ban_sate'                    => '禁用状态',
        'navigation_columns_name'             => '上导航栏名',
        'navigation_jump_url'                 => '上导航栏跳转url',
        'user_student_number'                 => '学号',
        'user_name'                           => '姓名',
        'user_grade'                          => '年级',
        'user_major'                          => '专业',
        'user_permissions'                    => '权限',
        'picture_file'                        => '封面图片文件',
        'study_route_title'                   => '学习路线标题',
        'study_route_intro'                   => '学习路线简介',
        'study_route_content'                 => '学习路线内容',
        'category_id'                         => '学习路线分类id',
        'study_route_state'                   => '学习路线状态',
        'study_route_cover_picture_id'        => '学习路线封面图片id',
        'study_route_video_id'                => '视频id',
        'rotation_picture_file'               => '轮播图图片文件',
        'rotation_click_url'                  => '轮播图点击url',
        'system_setting_site_record_info'     => '备案信息',
        'system_setting_other'                => '页脚其他信息',
        'system_setting_wx_qrcode'            => '微信二维码base64',
        'system_access_key_id'                => 'aliKeyID',
        'system_access_key_secret'            => 'aliKeySecret',
        'friendship_link_title'               => '友情链接标题',
        'friendship_link_click_url'           => '友情链接url',
        'category_id'                         => '友情链接分类',
        'category_big_name'                   => '大分类名',
        'category_name'                       => '小分类名',
        'pictures'                            => '图片',
        'video_id'                            => '视频id',
        'video_title'                         => '视频标题',
        'video_file_name'                     => '视频文件名字',
    ],
];
