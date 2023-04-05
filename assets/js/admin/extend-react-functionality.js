"use strict"

const el = wp.element.createElement;
const withState = wp.compose.withState;
const withSelect = wp.data.withSelect;
const withDispatch = wp.data.withDispatch;

wp.hooks.addFilter(
    'editor.PostFeaturedImage',
    'enchance-featured-image/disable-featured-image-control',
    wrapPostFeaturedImage
);

function wrapPostFeaturedImage(OriginalComponent) {
    return function (props) {
        return (
            el(
                wp.element.Fragment,
                {},
                el(
                    composedSelectBox
                ),
                el(
                    OriginalComponent,
                    props
                ),
                // el(
                //     composedCheckBox
                // ),

            )
        );
    }
}

class SelectBoxCustom extends React.Component {
    render() {
        const {
            meta,
            updateFeaturedImagePosition,
        } = this.props;

        return (
            el(
                wp.components.SelectControl,
                {
                    label: "Positioning",
                    help: "select a position.",
                    value: meta.featured_image_position,
                    onChange:
                        (value) => {
                            this.setState({isSelected: value});
                            updateFeaturedImagePosition(value, meta);
                        },
                    options: [
                        {value:"default", label: 'Default'},
                        {value:"left-top", label: 'Top Left'},
                        {value:"top", label: 'Top'},
                        {value:"right-top", label: 'Top Right'},
                        {value:"left-center", label: 'Center Left'},
                        {value:"center", label: 'Center'},
                        {value:"right-center", label: 'Center Right'},
                        {value:"left-bottom", label: 'Bottom Left'},
                        {value:"bottom", label: 'Bottom'},
                        {value:"right-bottom", label: 'Bottom Right'}
                    ]
                }
            )
        )
    }
}


const composedSelectBox = wp.compose.compose([
    withState((value) => {
        isSelected: value
    }),
    withSelect((select) => {
        const currentMeta = select('core/editor').getCurrentPostAttribute('meta');
        const editedMeta = select('core/editor').getEditedPostAttribute('meta');
        return {
            meta: {...currentMeta, ...editedMeta},
        };
    }),
    withDispatch((dispatch) => ({
        updateFeaturedImagePosition(value, meta) {
            meta = {
                ...meta,
                featured_image_position: value,
            };
            dispatch('core/editor').editPost({meta});
        },
    })),
])(SelectBoxCustom);