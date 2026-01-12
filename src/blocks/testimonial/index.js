/**
 * Testimonial Block
 */

import { registerBlockType } from '@wordpress/blocks';
import { 
    InspectorControls, 
    MediaUpload, 
    MediaUploadCheck,
    RichText,
    useBlockProps 
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    ToggleControl, 
    SelectControl,
    RangeControl,
    Button,
    ColorPicker,
    BaseControl
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { Icon } from '@wordpress/components';

import './editor.scss';
import './style.scss';

registerBlockType('travaaccount/testimonial', {
    edit: ({ attributes, setAttributes }) => {
        const {
            testimonialText,
            clientName,
            clientPosition,
            clientCompany,
            clientImage,
            rating,
            showRating,
            showImage,
            imagePosition,
            backgroundColor,
            textColor,
            alignment
        } = attributes;

        const blockProps = useBlockProps({
            className: `testimonial-block testimonial-align-${alignment} testimonial-image-${imagePosition}`,
            style: {
                backgroundColor: backgroundColor,
                color: textColor
            }
        });

        const onSelectImage = (media) => {
            setAttributes({
                clientImage: {
                    url: media.url,
                    alt: media.alt,
                    id: media.id
                }
            });
        };

        const removeImage = () => {
            setAttributes({
                clientImage: {
                    url: '',
                    alt: '',
                    id: 0
                }
            });
        };

        const renderStars = (rating) => {
            const stars = [];
            for (let i = 1; i <= 5; i++) {
                stars.push(
                    <span 
                        key={i} 
                        className={`star ${i <= rating ? 'filled' : ''}`}
                    >
                        ★
                    </span>
                );
            }
            return stars;
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Testimonial Settings', 'travaaccount')} initialOpen={true}>
                        <ToggleControl
                            label={__('Show Rating', 'travaaccount')}
                            checked={showRating}
                            onChange={(value) => setAttributes({ showRating: value })}
                        />
                        
                        {showRating && (
                            <RangeControl
                                label={__('Rating', 'travaaccount')}
                                value={rating}
                                onChange={(value) => setAttributes({ rating: value })}
                                min={1}
                                max={5}
                                step={0.5}
                            />
                        )}

                        <ToggleControl
                            label={__('Show Client Image', 'travaaccount')}
                            checked={showImage}
                            onChange={(value) => setAttributes({ showImage: value })}
                        />

                        {showImage && (
                            <SelectControl
                                label={__('Image Position', 'travaaccount')}
                                value={imagePosition}
                                options={[
                                    { label: __('Left', 'travaaccount'), value: 'left' },
                                    { label: __('Top', 'travaaccount'), value: 'top' },
                                    { label: __('Right', 'travaaccount'), value: 'right' }
                                ]}
                                onChange={(value) => setAttributes({ imagePosition: value })}
                            />
                        )}

                        <SelectControl
                            label={__('Text Alignment', 'travaaccount')}
                            value={alignment}
                            options={[
                                { label: __('Left', 'travaaccount'), value: 'left' },
                                { label: __('Center', 'travaaccount'), value: 'center' },
                                { label: __('Right', 'travaaccount'), value: 'right' }
                            ]}
                            onChange={(value) => setAttributes({ alignment: value })}
                        />
                    </PanelBody>

                    <PanelBody title={__('Colors', 'travaaccount')} initialOpen={false}>
                        <BaseControl label={__('Background Color', 'travaaccount')}>
                            <ColorPicker
                                color={backgroundColor}
                                onChangeComplete={(value) => setAttributes({ backgroundColor: value.hex })}
                            />
                        </BaseControl>

                        <BaseControl label={__('Text Color', 'travaaccount')}>
                            <ColorPicker
                                color={textColor}
                                onChangeComplete={(value) => setAttributes({ textColor: value.hex })}
                            />
                        </BaseControl>
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <div className="testimonial-content">
                        {showImage && (
                            <div className="testimonial-image-wrapper">
                                <MediaUploadCheck>
                                    <MediaUpload
                                        onSelect={onSelectImage}
                                        allowedTypes={['image']}
                                        value={clientImage.id}
                                        render={({ open }) => (
                                            <div className="testimonial-image-container">
                                                {clientImage.url ? (
                                                    <>
                                                        <img
                                                            src={clientImage.url}
                                                            alt={clientImage.alt || clientName}
                                                            className="testimonial-image"
                                                        />
                                                        <Button
                                                            onClick={removeImage}
                                                            isDestructive
                                                            className="remove-image-button"
                                                        >
                                                            {__('Remove', 'travaaccount')}
                                                        </Button>
                                                    </>
                                                ) : (
                                                    <Button
                                                        onClick={open}
                                                        className="upload-image-button"
                                                        variant="secondary"
                                                    >
                                                        {__('Upload Image', 'travaaccount')}
                                                    </Button>
                                                )}
                                            </div>
                                        )}
                                    />
                                </MediaUploadCheck>
                            </div>
                        )}

                        <div className="testimonial-text-content">
                            <div className="testimonial-quote-icon">❝</div>
                            
                            <RichText
                                tagName="blockquote"
                                className="testimonial-quote"
                                value={testimonialText}
                                onChange={(value) => setAttributes({ testimonialText: value })}
                                placeholder={__('Enter testimonial text...', 'travaaccount')}
                            />

                            {showRating && (
                                <div className="testimonial-rating">
                                    {renderStars(rating)}
                                </div>
                            )}

                            <div className="testimonial-client-info">
                                <RichText
                                    tagName="div"
                                    className="client-name"
                                    value={clientName}
                                    onChange={(value) => setAttributes({ clientName: value })}
                                    placeholder={__('Client Name', 'travaaccount')}
                                />
                                
                                <div className="client-details">
                                    <RichText
                                        tagName="span"
                                        className="client-position"
                                        value={clientPosition}
                                        onChange={(value) => setAttributes({ clientPosition: value })}
                                        placeholder={__('Position', 'travaaccount')}
                                    />
                                    <span className="separator">•</span>
                                    <RichText
                                        tagName="span"
                                        className="client-company"
                                        value={clientCompany}
                                        onChange={(value) => setAttributes({ clientCompany: value })}
                                        placeholder={__('Company', 'travaaccount')}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },

    save: ({ attributes }) => {
        const {
            testimonialText,
            clientName,
            clientPosition,
            clientCompany,
            clientImage,
            rating,
            showRating,
            showImage,
            imagePosition,
            backgroundColor,
            textColor,
            alignment
        } = attributes;

        const blockProps = useBlockProps.save({
            className: `testimonial-block testimonial-align-${alignment} testimonial-image-${imagePosition}`,
            style: {
                backgroundColor: backgroundColor,
                color: textColor
            }
        });

        const renderStars = (rating) => {
            const stars = [];
            for (let i = 1; i <= 5; i++) {
                stars.push(
                    <span 
                        key={i} 
                        className={`star ${i <= rating ? 'filled' : ''}`}
                    >
                        ★
                    </span>
                );
            }
            return stars;
        };

        return (
            <div {...blockProps}>
                <div className="testimonial-content">
                    {showImage && clientImage.url && (
                        <div className="testimonial-image-wrapper">
                            <img
                                src={clientImage.url}
                                alt={clientImage.alt || clientName}
                                className="testimonial-image"
                            />
                        </div>
                    )}

                    <div className="testimonial-text-content">
                        <div className="testimonial-quote-icon">❝</div>
                        
                        <RichText.Content
                            tagName="blockquote"
                            className="testimonial-quote"
                            value={testimonialText}
                        />

                        {showRating && (
                            <div className="testimonial-rating">
                                {renderStars(rating)}
                            </div>
                        )}

                        <div className="testimonial-client-info">
                            <RichText.Content
                                tagName="div"
                                className="client-name"
                                value={clientName}
                            />
                            
                            <div className="client-details">
                                <RichText.Content
                                    tagName="span"
                                    className="client-position"
                                    value={clientPosition}
                                />
                                <span className="separator">•</span>
                                <RichText.Content
                                    tagName="span"
                                    className="client-company"
                                    value={clientCompany}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
});