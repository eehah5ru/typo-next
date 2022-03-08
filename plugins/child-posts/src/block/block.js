/**
 * BLOCK: child-posts
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import { useBlockProps,
         RichText,
         AlignmentToolbar,
         InspectorControls,         
         BlockControls } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-child-posts', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'child-posts - CGB Block123' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	// keywords: [
	// 	__( 'child-posts — CGB Block' ),
	// 	__( 'CGB Example' ),
	// 	__( 'create-guten-block' ),
	// ],
  apiVersion: 2,
  attributes: {
    title: {
      type: 'string',
      default: 'none'
    },
    layout: {
      type: 'string',
      default: 'standard'
    },
    content: {
        type: 'array',
        source: 'children',
        selector: 'p',
    },    
  },

  example: {
    attributes: {
      title: 'Hello World',
      content: 'this is content',
      layout: 'standard'
    },
  },  

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: ( props ) => {
    const {
      attributes: { content, title, layout },
      setAttributes,
      className,
    } = props;
    const blockProps = useBlockProps();
    
    const onChangeContent = ( newContent ) => {
      setAttributes( { content: newContent } );
    };

    const onChangeTitle = ( newTitle ) => {
      setAttributes( {
        title: newTitle === undefined ? 'none' : newTitle
      });
    };

    const onChangeLayout = ( newLayout ) => {
      setAttributes( {
        layout: newLayout === undefined ? 'standard' : newLayout
      });
    }
    
		// Creates a <p class='wp-block-cgb-block-child-posts'></p>.
		return (
      <div { ...blockProps}>
        {
          <InspectorControls key="setting">
            <TextControl
              label="child posts selector / all for all children"
              value={ props.attributes.title }
              onChange={ onChangeTitle }
            />
            <TextControl
              label="layout"
              value={ props.attributes.layout }
              onChange={ onChangeLayout }
            />
            
          </InspectorControls>
        }
        <RichText
          { ...blockProps }
          tagName="p"
          onChange={ onChangeContent }
          value={ content }
        />              
      </div>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( props ) => {
    const blockProps = useBlockProps.save();
    
		return (
        <RichText.Content
          { ...blockProps }
          tagName="p"
          value={ props.attributes.content }
        />      
		);
	},
} );
