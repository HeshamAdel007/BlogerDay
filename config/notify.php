<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | By default the theme white is activated, but you can change it by
    | specifying the dark mode. if null `white` theme is active. To change theme
    | update the global variable to `dark`
    |
    */

    'theme' => env('NOTIFY_THEME', null),

    /*
    |--------------------------------------------------------------------------
    | Demo URL
    |--------------------------------------------------------------------------
    |
    | if true you can access to the demo documentation of the notify package
    | here: http://localhost:8000/notify/demo, by default is true
    |
    */

    'demo' => true,

    /*
    |--------------------------------------------------------------------------
    | Animate Module (use animate.css)
    |--------------------------------------------------------------------------
    |
    | Use animate.css to animate the notice.
    |
    */

    'animate' => [
        'in_class'  => 'bounceInRight', // The class to use to animate the notice in.
        'out_class' => 'bounceOutRight', // The class to use to animate the notice out.
        'timeout'   => 6500, // Number of seconds before the notice disappears
    ],

    /*
    |--------------------------------------------------------------------------
    | Notify Position
    |--------------------------------------------------------------------------
    |
    | The position string option is used to describe both vertical and horizontal alignment.
    | Element notifications and Global notifications can be vertically repositioned
    | to: "top", "middle" or "bottom" and horizontally repositioned to: "left", "center" or "right".
    | If we don't provide a position option the default alignments are "top right".
    | `Don't work on drakify notification`
    |
    | Available positions:
    | - "top-right"
    | - "top-left"
    | - "bottom-right"
    | - "bottom-left"
    | - "center-top"
    | - "center-bottom"
    |
    */

    'position' => 'top-right',

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    |
    */

    'preset-messages' => [
        // Admins
        'admin-create' => [
            'message' => 'The Admin Has Been Created Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Admin Created',
        ],
        'admin-update' => [
            'message' => 'The Admin Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Admin Updated',
        ],
        'admin-delete' => [
            'message' => 'The Admin Has Been Deleted Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Admin Deleted',
        ],

        // Categories
        'category-create' => [
            'message' => 'The Category Has Been Created Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Category Created',
        ],
        'category-update' => [
            'message' => 'The Category Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Category Updated',
        ],
        'category-delete' => [
            'message' => 'The Category Has Been Deleted Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Category Deleted',
        ],

        // Tags
        'tag-create' => [
            'message' => 'The Tag Has Been Created Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Tag Created',
        ],
        'tag-update' => [
            'message' => 'The Tag Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Tag Updated',
        ],
        'tag-delete' => [
            'message' => 'The Tag Has Been Deleted Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Tag Deleted',
        ],

         // Posts
        'post-create' => [
            'message' => 'The Post Has Been Created Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Post Created',
        ],
        'post-update' => [
            'message' => 'The Post Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Post Updated',
        ],
        'post-delete' => [
            'message' => 'The Post Has Been Deleted Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Post Deleted',
        ],
        'post-restore' => [
            'message' => 'The Post Has Been Restore Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Post Restore',
        ],

        // Galary
        'galary-create' => [
            'message' => 'Add Image Has Been Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Add Image',
        ],
        'galary-update' => [
            'message' => 'The Image Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Image Updated',
        ],
        'galary-delete' => [
            'message' => 'The Tag Has Been Deleted Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Image Deleted',
        ],

        // Filled Nullable
        'filled-null' => [
            'message' => 'The Filled Is Nullable You Should Writeing Something.',
            'type'    => 'error',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Filled Null',
        ],

        // Profile
        'profile-update' => [
            'message' => 'The Profile Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Profile Update',
        ],

        // Setting
        'setting-update' => [
            'message' => 'The Setting Has Been Updated Successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'Setting Update',
        ],
    ],

];
