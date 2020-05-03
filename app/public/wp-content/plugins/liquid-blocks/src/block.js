const { registerPlugin } = wp.plugins; 
const { PluginSidebar, PluginSidebarMoreMenuItem } = wp.editPost;
const { Fragment } = wp.element;
const { Panel, PanelBody, PanelRow, Button, Spinner } = wp.components;
const { parse } = wp.blocks;
const { registerFormatType, toggleFormat } = wp.richText;
const { RichTextToolbarButton } = wp.editor;
const { __ } = wp.i18n;

const LiquidIcon = wp.element.createElement('svg', 
	{ 
		width: 20, 
		height: 20 
	},
	wp.element.createElement( 'path',
		{
			d: "M14.82,18.27a2.08,2.08,0,0,1-1.44.59,1.84,1.84,0,0,1-.83-.19,1.76,1.76,0,0,1-.69-.51,1.21,1.21,0,0,0-.43-.32,1,1,0,0,0-.52-.11H9.05a1,1,0,0,0-.52.11,1.13,1.13,0,0,0-.43.32l0,.06,0,.07-.11.08-.15.12-.19.12a.84.84,0,0,1-.14.06h0l-.22.08L7,18.81a3.08,3.08,0,0,1-.43,0,2.06,2.06,0,0,1-1.42-.6,2,2,0,0,1-.6-1.43,2.8,2.8,0,0,1,0-.41V16.2A2.09,2.09,0,0,1,4.62,16h0l.08-.12.12-.21L5,15.51l.1-.12.06-.05h0a1.67,1.67,0,0,0,.39-.45,1.35,1.35,0,0,0,.11-.52V12.49A1.26,1.26,0,0,0,5.59,12a1.46,1.46,0,0,0-.32-.42,2.23,2.23,0,0,1-.53-.69,2,2,0,0,1-.2-.85A2,2,0,0,1,8,8.59,2.08,2.08,0,0,1,8.6,10a2.1,2.1,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.46,1.46,0,0,0-.32.42,1.26,1.26,0,0,0-.11.51v1.92a1.31,1.31,0,0,0,.11.52,1.46,1.46,0,0,0,.32.42.43.43,0,0,1,.11.12l.11.1a1,1,0,0,0,.43.31,1,1,0,0,0,.52.11h1.86a1,1,0,0,0,.52-.11,1.08,1.08,0,0,0,.43-.31,1.78,1.78,0,0,1,.69-.52,2,2,0,0,1,.83-.19,2.09,2.09,0,0,1,1.44.6,2,2,0,0,1,0,2.84h0Zm-.45-10.2a1.42,1.42,0,0,0,.32.41,2.28,2.28,0,0,1,.53.7,2,2,0,0,1,.25.84,2.05,2.05,0,0,1-.59,1.43,2,2,0,0,1-2.87,0A2,2,0,0,1,11.42,10a1.87,1.87,0,0,1,.18-.84,2.28,2.28,0,0,1,.53-.7,1.42,1.42,0,0,0,.32-.41,1.31,1.31,0,0,0,.11-.52V5.63a1.31,1.31,0,0,0-.11-.52,1.42,1.42,0,0,0-.32-.41A2.28,2.28,0,0,1,11.6,4a1.87,1.87,0,0,1-.18-.84A2,2,0,0,1,12,1.73,2,2,0,0,1,15.47,3.2a1.92,1.92,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.43,1.43,0,0,0-.31.42,1,1,0,0,0-.11.51V7.55A1.15,1.15,0,0,0,14.37,8.07Z" 
		}
	)
);

let s_tag = [];
for ( let s=0; s<10; s++ ) {
    if( liquid_blocks_no[0] ){
        if( liquid_blocks_no[s] ){
            s_tag.push('liquid_blocks_tags');
        }else{
            s_tag.push('liquid_blocks_none');
        }
    }else{
        s_tag.push('liquid_blocks_tags');
    }
}
let s_no = [];
for ( let s=0; s<10; s++ ) {
    if( liquid_blocks_no[s] ){
        let r = Number(liquid_blocks_no[s])-1;
        s_no.push(r);
    }else{
        s_no.push(s);
    }
}
let s_type = [];
for ( let s=0; s<10; s++ ) {
    if( liquid_blocks_type[s] ){
        s_type.push(liquid_blocks_type[s]);
    }else{
        s_type.push('Layouts');
    }
}
let s_name = [];
for ( let s=0; s<10; s++ ) {
    if( liquid_blocks_name[s] ){
        s_name.push(liquid_blocks_name[s]);
    }else{
        let t = s+1;
        s_name.push( __( 'Layouts', 'liquid-blocks' ) +':'+t);
    }
}

const LiquidPluginSidebarMoreMenuItem = () => (
    <Fragment>
        <PluginSidebarMoreMenuItem
            target="liquid_blocks_sidebar"
            icon={ LiquidIcon }
        >
            { __( 'LIQUID BLOCKS', 'liquid-blocks' ) }
        </PluginSidebarMoreMenuItem>
        <PluginSidebar
            name="liquid_blocks_sidebar"
            className="liquid_blocks_sidebar"
            icon={ LiquidIcon }
            title={ __( 'LIQUID BLOCKS', 'liquid-blocks' ) }
        >
            <PanelBody
                title={ __( 'Shortcuts', 'liquid-blocks' ) }
                icon=""
                initialOpen={ true }
            >
                <PanelRow
                    className="liquid_blocks_row"
                >
                    <Button
                        className={ s_tag[0] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[0]][s_no[0]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[0] }
                    </Button>
                    <Button
                        className={ s_tag[1] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[1]][s_no[1]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[1] }
                    </Button>
                    <Button
                        className={ s_tag[2] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[2]][s_no[2]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[2] }
                    </Button>
                    <Button
                        className={ s_tag[3] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[3]][s_no[3]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[3] }
                    </Button>
                    <Button
                        className={ s_tag[4] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[4]][s_no[4]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[4] }
                    </Button>
                    <Button
                        className={ s_tag[5] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[5]][s_no[5]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[5] }
                    </Button>
                    <Button
                        className={ s_tag[6] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[6]][s_no[6]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[6] }
                    </Button>
                    <Button
                        className={ s_tag[7] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[7]][s_no[7]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[7] }
                    </Button>
                    <Button
                        className={ s_tag[8] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[8]][s_no[8]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[8] }
                    </Button>
                    <Button
                        className={ s_tag[9] }
                        onClick={ () => {
                            const content = wp.blocks.parse( LiquidGallery[s_type[9]][s_no[9]] );
                            wp.data.dispatch( 'core/editor' ).insertBlocks(content);
                        } }
                    >
                        { s_name[9] }
                    </Button>
				    <p class="text-right"><a href="options-general.php?page=liquid-blocks" target="_blank">{ __( 'Settings', 'liquid-blocks' ) }</a></p>
                </PanelRow>
            </PanelBody>
            <PanelBody
                title={ __( 'Gallery', 'liquid-blocks' ) }
                icon=""
                initialOpen={ true }
            >
                <PanelRow
                    className="liquid_blocks_row"
                >
                    <p>{ __( 'Just choose your favorite design!', 'liquid-blocks' ) }</p>
                    <Button
                        className="liquid_blocks_bnr liquid_blocks_def"
                        onClick={ () => {
                            document.getElementById("liquid_blocks_modal").classList.toggle('active');
                        } }
                    >
                    </Button>
                    <Button
                        className="liquid_blocks_bnr liquid_blocks_pro"
                        onClick={ () => {
                            document.getElementById("liquid_blocks_modal_pro").classList.toggle('active');
                        } }
                    >
                    </Button>
                    <Button
                        className="liquid_blocks_bnr liquid_blocks_lp"
                        onClick={ () => {
                            document.getElementById("liquid_blocks_modal_lp").classList.toggle('active');
                        } }
                    >
                    </Button>
                    <Button
                        className="liquid_blocks_bnr liquid_blocks_sp"
                        onClick={ () => {
                            document.getElementById("liquid_blocks_modal_sp").classList.toggle('active');
                        } }
                    >
                    </Button>
                    <p class="text-right"><a href="https://lqd.jp/wp/?utm_source=admin&utm_medium=plugin&utm_campaign=blocks" target="_blank">{ __( 'LIQUID PRESS', 'liquid-blocks' ) }</a></p>
                </PanelRow>
            </PanelBody>
        </PluginSidebar>
    </Fragment>
)
registerPlugin( 'liquid-blocks', { render: LiquidPluginSidebarMoreMenuItem } );

const LiquidCustomButtonMark = props => {
    return <RichTextToolbarButton
        icon='edit'
        title={ __( 'Mark', 'liquid-blocks' ) }
        onClick={ () => {
            props.onChange( toggleFormat(
                props.value,
                { type: 'liquid-blocks-format/mark' }
            ) );
        } }
        isActive={ props.isActive }
    />
};
registerFormatType(
    'liquid-blocks-format/mark', {
        title: __( 'Mark', 'liquid-blocks' ),
        tagName: 'mark',
        className: null,
        edit: LiquidCustomButtonMark,
    }
);

const LiquidCustomButtonBig = props => {
    return <RichTextToolbarButton
        icon='editor-textcolor'
        title={ __( 'Big', 'liquid-blocks' ) }
        onClick={ () => {
            props.onChange( toggleFormat(
                props.value,
                { type: 'liquid-blocks-format/big' }
            ) );
        } }
        isActive={ props.isActive }
    />
};
registerFormatType(
    'liquid-blocks-format/big', {
        title: __( 'Big', 'liquid-blocks' ),
        tagName: 'big',
        className: null,
        edit: LiquidCustomButtonBig,
    }
);

const LiquidCustomButtonSmall = props => {
    return <RichTextToolbarButton
        icon='editor-textcolor'
        title={ __( 'Small', 'liquid-blocks' ) }
        onClick={ () => {
            props.onChange( toggleFormat(
                props.value,
                { type: 'liquid-blocks-format/small' }
            ) );
        } }
        isActive={ props.isActive }
    />
};
registerFormatType(
    'liquid-blocks-format/small', {
        title: __( 'Small', 'liquid-blocks' ),
        tagName: 'small',
        className: null,
        edit: LiquidCustomButtonSmall,
    }
);

const LiquidButtonUnderline = props => {
    return <RichTextToolbarButton
        icon='editor-underline'
        title={ __( 'Underline', 'liquid-blocks' ) }
        onClick={ () => {
            props.onChange( toggleFormat(
                props.value,
                { type: 'liquid-blocks-format/underline' }
            ) );
        } }
        isActive={ props.isActive }
    />
};
registerFormatType(
    'liquid-blocks-format/underline', {
        title: __( 'Underline', 'liquid-blocks' ),
        tagName: 'u',
        className: null,
        edit: LiquidButtonUnderline,
    }
);

function LiquidGalleryButton(contents) {
    let content = wp.blocks.parse(contents);
    wp.data.dispatch( 'core/editor' ).insertBlocks(content);
}

function LiquidGalleryList(elements, dir = liquid_blocks_imgurl) {
    for( let i in LiquidGallery[elements] ) {
        let j = Number(i)+1;
        let list = '<a onclick="LiquidGalleryButton(LiquidGallery[\''+elements+'\']['+i+'])"><img src="'+dir+elements+'/'+j+'.png" alt="'+j+'"><span>'+j+'</span></a>';
        document.write(list);
    }
}

function LiquidGalleryClose(){        
    var liquid_blocks_modal = document.querySelectorAll('.liquid_blocks_modal');
    for (var i=0; i<liquid_blocks_modal.length; i++){
        liquid_blocks_modal[i].classList.remove('active');
    }
}
