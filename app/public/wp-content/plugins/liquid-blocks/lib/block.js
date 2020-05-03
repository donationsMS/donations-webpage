'use strict';

var registerPlugin = wp.plugins.registerPlugin;
var _wp$editPost = wp.editPost,
    PluginSidebar = _wp$editPost.PluginSidebar,
    PluginSidebarMoreMenuItem = _wp$editPost.PluginSidebarMoreMenuItem;
var Fragment = wp.element.Fragment;
var _wp$components = wp.components,
    Panel = _wp$components.Panel,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    Button = _wp$components.Button,
    Spinner = _wp$components.Spinner;
var parse = wp.blocks.parse;
var _wp$richText = wp.richText,
    registerFormatType = _wp$richText.registerFormatType,
    toggleFormat = _wp$richText.toggleFormat;
var RichTextToolbarButton = wp.editor.RichTextToolbarButton;
var __ = wp.i18n.__;


var LiquidIcon = wp.element.createElement('svg', {
    width: 20,
    height: 20
}, wp.element.createElement('path', {
    d: "M14.82,18.27a2.08,2.08,0,0,1-1.44.59,1.84,1.84,0,0,1-.83-.19,1.76,1.76,0,0,1-.69-.51,1.21,1.21,0,0,0-.43-.32,1,1,0,0,0-.52-.11H9.05a1,1,0,0,0-.52.11,1.13,1.13,0,0,0-.43.32l0,.06,0,.07-.11.08-.15.12-.19.12a.84.84,0,0,1-.14.06h0l-.22.08L7,18.81a3.08,3.08,0,0,1-.43,0,2.06,2.06,0,0,1-1.42-.6,2,2,0,0,1-.6-1.43,2.8,2.8,0,0,1,0-.41V16.2A2.09,2.09,0,0,1,4.62,16h0l.08-.12.12-.21L5,15.51l.1-.12.06-.05h0a1.67,1.67,0,0,0,.39-.45,1.35,1.35,0,0,0,.11-.52V12.49A1.26,1.26,0,0,0,5.59,12a1.46,1.46,0,0,0-.32-.42,2.23,2.23,0,0,1-.53-.69,2,2,0,0,1-.2-.85A2,2,0,0,1,8,8.59,2.08,2.08,0,0,1,8.6,10a2.1,2.1,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.46,1.46,0,0,0-.32.42,1.26,1.26,0,0,0-.11.51v1.92a1.31,1.31,0,0,0,.11.52,1.46,1.46,0,0,0,.32.42.43.43,0,0,1,.11.12l.11.1a1,1,0,0,0,.43.31,1,1,0,0,0,.52.11h1.86a1,1,0,0,0,.52-.11,1.08,1.08,0,0,0,.43-.31,1.78,1.78,0,0,1,.69-.52,2,2,0,0,1,.83-.19,2.09,2.09,0,0,1,1.44.6,2,2,0,0,1,0,2.84h0Zm-.45-10.2a1.42,1.42,0,0,0,.32.41,2.28,2.28,0,0,1,.53.7,2,2,0,0,1,.25.84,2.05,2.05,0,0,1-.59,1.43,2,2,0,0,1-2.87,0A2,2,0,0,1,11.42,10a1.87,1.87,0,0,1,.18-.84,2.28,2.28,0,0,1,.53-.7,1.42,1.42,0,0,0,.32-.41,1.31,1.31,0,0,0,.11-.52V5.63a1.31,1.31,0,0,0-.11-.52,1.42,1.42,0,0,0-.32-.41A2.28,2.28,0,0,1,11.6,4a1.87,1.87,0,0,1-.18-.84A2,2,0,0,1,12,1.73,2,2,0,0,1,15.47,3.2a1.92,1.92,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.43,1.43,0,0,0-.31.42,1,1,0,0,0-.11.51V7.55A1.15,1.15,0,0,0,14.37,8.07Z"
}));

var s_tag = [];
for (var s = 0; s < 10; s++) {
    if (liquid_blocks_no[0]) {
        if (liquid_blocks_no[s]) {
            s_tag.push('liquid_blocks_tags');
        } else {
            s_tag.push('liquid_blocks_none');
        }
    } else {
        s_tag.push('liquid_blocks_tags');
    }
}
var s_no = [];
for (var _s = 0; _s < 10; _s++) {
    if (liquid_blocks_no[_s]) {
        var r = Number(liquid_blocks_no[_s]) - 1;
        s_no.push(r);
    } else {
        s_no.push(_s);
    }
}
var s_type = [];
for (var _s2 = 0; _s2 < 10; _s2++) {
    if (liquid_blocks_type[_s2]) {
        s_type.push(liquid_blocks_type[_s2]);
    } else {
        s_type.push('Layouts');
    }
}
var s_name = [];
for (var _s3 = 0; _s3 < 10; _s3++) {
    if (liquid_blocks_name[_s3]) {
        s_name.push(liquid_blocks_name[_s3]);
    } else {
        var t = _s3 + 1;
        s_name.push(__('Layouts', 'liquid-blocks') + ':' + t);
    }
}

var LiquidPluginSidebarMoreMenuItem = function LiquidPluginSidebarMoreMenuItem() {
    return React.createElement(
        Fragment,
        null,
        React.createElement(
            PluginSidebarMoreMenuItem,
            {
                target: 'liquid_blocks_sidebar',
                icon: LiquidIcon
            },
            __('LIQUID BLOCKS', 'liquid-blocks')
        ),
        React.createElement(
            PluginSidebar,
            {
                name: 'liquid_blocks_sidebar',
                className: 'liquid_blocks_sidebar',
                icon: LiquidIcon,
                title: __('LIQUID BLOCKS', 'liquid-blocks')
            },
            React.createElement(
                PanelBody,
                {
                    title: __('Shortcuts', 'liquid-blocks'),
                    icon: '',
                    initialOpen: true
                },
                React.createElement(
                    PanelRow,
                    {
                        className: 'liquid_blocks_row'
                    },
                    React.createElement(
                        Button,
                        {
                            className: s_tag[0],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[0]][s_no[0]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[0]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[1],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[1]][s_no[1]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[1]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[2],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[2]][s_no[2]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[2]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[3],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[3]][s_no[3]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[3]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[4],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[4]][s_no[4]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[4]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[5],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[5]][s_no[5]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[5]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[6],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[6]][s_no[6]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[6]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[7],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[7]][s_no[7]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[7]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[8],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[8]][s_no[8]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[8]
                    ),
                    React.createElement(
                        Button,
                        {
                            className: s_tag[9],
                            onClick: function onClick() {
                                var content = wp.blocks.parse(LiquidGallery[s_type[9]][s_no[9]]);
                                wp.data.dispatch('core/editor').insertBlocks(content);
                            }
                        },
                        s_name[9]
                    ),
                    React.createElement(
                        'p',
                        { 'class': 'text-right' },
                        React.createElement(
                            'a',
                            { href: 'options-general.php?page=liquid-blocks', target: '_blank' },
                            __('Settings', 'liquid-blocks')
                        )
                    )
                )
            ),
            React.createElement(
                PanelBody,
                {
                    title: __('Gallery', 'liquid-blocks'),
                    icon: '',
                    initialOpen: true
                },
                React.createElement(
                    PanelRow,
                    {
                        className: 'liquid_blocks_row'
                    },
                    React.createElement(
                        'p',
                        null,
                        __('Just choose your favorite design!', 'liquid-blocks')
                    ),
                    React.createElement(Button, {
                        className: 'liquid_blocks_bnr liquid_blocks_def',
                        onClick: function onClick() {
                            document.getElementById("liquid_blocks_modal").classList.toggle('active');
                        }
                    }),
                    React.createElement(Button, {
                        className: 'liquid_blocks_bnr liquid_blocks_pro',
                        onClick: function onClick() {
                            document.getElementById("liquid_blocks_modal_pro").classList.toggle('active');
                        }
                    }),
                    React.createElement(Button, {
                        className: 'liquid_blocks_bnr liquid_blocks_lp',
                        onClick: function onClick() {
                            document.getElementById("liquid_blocks_modal_lp").classList.toggle('active');
                        }
                    }),
                    React.createElement(Button, {
                        className: 'liquid_blocks_bnr liquid_blocks_sp',
                        onClick: function onClick() {
                            document.getElementById("liquid_blocks_modal_sp").classList.toggle('active');
                        }
                    }),
                    React.createElement(
                        'p',
                        { 'class': 'text-right' },
                        React.createElement(
                            'a',
                            { href: 'https://lqd.jp/wp/?utm_source=admin&utm_medium=plugin&utm_campaign=blocks', target: '_blank' },
                            __('LIQUID PRESS', 'liquid-blocks')
                        )
                    )
                )
            )
        )
    );
};
registerPlugin('liquid-blocks', { render: LiquidPluginSidebarMoreMenuItem });

var LiquidCustomButtonMark = function LiquidCustomButtonMark(props) {
    return React.createElement(RichTextToolbarButton, {
        icon: 'edit',
        title: __('Mark', 'liquid-blocks'),
        onClick: function onClick() {
            props.onChange(toggleFormat(props.value, { type: 'liquid-blocks-format/mark' }));
        },
        isActive: props.isActive
    });
};
registerFormatType('liquid-blocks-format/mark', {
    title: __('Mark', 'liquid-blocks'),
    tagName: 'mark',
    className: null,
    edit: LiquidCustomButtonMark
});

var LiquidCustomButtonBig = function LiquidCustomButtonBig(props) {
    return React.createElement(RichTextToolbarButton, {
        icon: 'editor-textcolor',
        title: __('Big', 'liquid-blocks'),
        onClick: function onClick() {
            props.onChange(toggleFormat(props.value, { type: 'liquid-blocks-format/big' }));
        },
        isActive: props.isActive
    });
};
registerFormatType('liquid-blocks-format/big', {
    title: __('Big', 'liquid-blocks'),
    tagName: 'big',
    className: null,
    edit: LiquidCustomButtonBig
});

var LiquidCustomButtonSmall = function LiquidCustomButtonSmall(props) {
    return React.createElement(RichTextToolbarButton, {
        icon: 'editor-textcolor',
        title: __('Small', 'liquid-blocks'),
        onClick: function onClick() {
            props.onChange(toggleFormat(props.value, { type: 'liquid-blocks-format/small' }));
        },
        isActive: props.isActive
    });
};
registerFormatType('liquid-blocks-format/small', {
    title: __('Small', 'liquid-blocks'),
    tagName: 'small',
    className: null,
    edit: LiquidCustomButtonSmall
});

var LiquidButtonUnderline = function LiquidButtonUnderline(props) {
    return React.createElement(RichTextToolbarButton, {
        icon: 'editor-underline',
        title: __('Underline', 'liquid-blocks'),
        onClick: function onClick() {
            props.onChange(toggleFormat(props.value, { type: 'liquid-blocks-format/underline' }));
        },
        isActive: props.isActive
    });
};
registerFormatType('liquid-blocks-format/underline', {
    title: __('Underline', 'liquid-blocks'),
    tagName: 'u',
    className: null,
    edit: LiquidButtonUnderline
});

function LiquidGalleryButton(contents) {
    var content = wp.blocks.parse(contents);
    wp.data.dispatch('core/editor').insertBlocks(content);
}

function LiquidGalleryList(elements) {
    var dir = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : liquid_blocks_imgurl;

    for (var i in LiquidGallery[elements]) {
        var j = Number(i) + 1;
        var list = '<a onclick="LiquidGalleryButton(LiquidGallery[\'' + elements + '\'][' + i + '])"><img src="' + dir + elements + '/' + j + '.png" alt="' + j + '"><span>' + j + '</span></a>';
        document.write(list);
    }
}

function LiquidGalleryClose() {
    var liquid_blocks_modal = document.querySelectorAll('.liquid_blocks_modal');
    for (var i = 0; i < liquid_blocks_modal.length; i++) {
        liquid_blocks_modal[i].classList.remove('active');
    }
}